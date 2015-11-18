<?php
namespace App\Controller;

use App\Controller\AppController;

class DoencasController extends AppController{
	
	public $helpers = [
		'Paginator'
	];
	
	public $paginate = [
        'limit' => 10
    ];
	
	public function inserir(){
		if ($this->request->is('post')) {
			$doenca = $this->Doencas->newEntity($this->request->data);
			$doenca = $this->Doencas->save($doenca);
			$this->response->body($doenca->id);
			return $this->response;
		}
    }
	
	public function index(){
		
		$condicoes = [];
		
		if (!empty($this->request->query)){
			
			if (isset($this->request->query['codigo']) && $this->request->query['codigo'] != ''){
				$condicoes['codigo LIKE'] = '%'.$this->request->query['codigo'].'%';
			} 
			
			if (isset($this->request->query['nome']) && $this->request->query['nome'] != ''){
				$condicoes['nome LIKE'] = '%'.$this->request->query['nome'].'%';
			} 

		}
			
		$this->paginate = [
			'conditions' => $condicoes
		];		
		$doencas = $this->paginate($this->Doencas);
		$this->set(compact('doencas'));
    }
	
	public function importar(){
		
		ini_set('memory_limit','1024M');
		
		if ($this->request->is('post')) {
			
			$arquivo_original = $this->request->data['DoencasArquivo']['name'];
			$ext = pathinfo($arquivo_original, PATHINFO_EXTENSION);
			$novo_arquivo = date('YmdHis').'.'.$ext;
			$caminho = 'files/'.$novo_arquivo;
			copy($this->request->data['DoencasArquivo']['tmp_name'], $caminho);
			
			
			$this->loadModel('CidCapitulos');
			$this->loadModel('CidGrupos');
			$this->loadModel('CidCategorias');
			$this->loadModel('CidSubcategorias');
			
			@$xml  = simplexml_load_file($caminho);
			foreach ( $xml->capitulo as $capitulo ) {
				$cap['nome']    = (string)$capitulo->nome;
				$cap['nome50']  = (string)$capitulo->nome50;
				//procurar capitulo, se nao existente salva
				$cidcap         = $this->CidCapitulos->find('all', [
					'conditions' => [
						'CidCapitulos.nome' => $cap['nome'],
						'CidCapitulos.nome50' => $cap['nome50'],
					]
				]);
				if ( $cidcap->count() == 0 ) {
					$capE    = $this->CidCapitulos->newEntity($cap);
					if ( $this->CidCapitulos->save($capE) ) {
						$cap_id = $capE->id;
					}
				} else {
					$cidcap = $cidcap->toArray();
					$cap_id = $cidcap['0']->id;
				}
				foreach ( $capitulo->grupo as $grupo ) {
					$gru    = array();
					$gru['cid_capitulos_id']    = $cap_id;
					$gru['nome']                = (string)$grupo->nome;
					$gru['nome50']              = (string)$grupo->nome50;
					//procurar grupo, se nao existente salva
					$cidgru         = $this->CidGrupos->find('all', [
						'conditions' => [
							'CidGrupos.cid_capitulos_id' => $gru['cid_capitulos_id'],
							'CidGrupos.nome' => $gru['nome'],
							'CidGrupos.nome50' => $gru['nome50'],
						]
					]);
					if ( $cidgru->count() == 0 ) {
						$gruE    = $this->CidGrupos->newEntity($gru);
						if ( $this->CidGrupos->save($gruE) ) {
							$gru_id = $gruE->id;
						}
					} else {
						$cidgru = $cidgru->toArray();
						$gru_id = $cidgru['0']->id;
					}
					foreach ( $grupo->categoria as $categoria ) {
						$cat        = array();
						$cat['cid_grupos_id']   = $gru_id;
						$cat['nome']            = (string)$categoria->nome;
						$cat['nome50']          = (string)$categoria->nome50;
						$cat['codigo']          = (string)$categoria->attributes()->codcat;
						//procurar categoria, se nao existente salva
						$cidcat         = $this->CidCategorias->find('all', [
							'conditions' => [
								'CidCategorias.cid_grupos_id' => $cat['cid_grupos_id'],
								'CidCategorias.nome' => $cat['nome'],
								'CidCategorias.nome50' => $cat['nome50'],
							]
						]);
						if ( $cidcat->count() == 0 ) {
							$catE    = $this->CidCategorias->newEntity($cat);
							if ( $this->CidCategorias->save($catE) ) {
								$cat_id = $catE->id;
							}
						} else {
							$cidcat = $cidcat->toArray();
							$cat_id = $cidcat['0']->id;
						}
						foreach ( $categoria->subcategoria as $subcategoria ) {
							$scat                       = array();
							$scat['cid_categorias_id']  = $cat_id;
							$scat['nome']               = (string)$subcategoria->nome;
							$scat['nome50']             = (string)$subcategoria->nome50;
							$scat['codigo']             = (string)$subcategoria->attributes()->codsubcat;
							//procurar subcategoria, se nao existente salva
							$cidscat         = $this->CidSubcategorias->find('all', [
								'conditions' => [
									'CidSubcategorias.cid_categorias_id' => $scat['cid_categorias_id'],
									'CidSubcategorias.nome' => $scat['nome'],
									'CidSubcategorias.nome50' => $scat['nome50'],
								]
							]);
							if ( $cidscat->count() == 0 ) {
								$scatE  = $this->CidSubcategorias->newEntity($scat);
								$this->CidSubcategorias->save($scatE);
							}
							$cat['subcategorias'][]     = $scat;
						}
						$gru['categorias'][]    = $cat;
					}
					$cap['grupos'][] = $gru;
				}
			}
				
		}
		
	}
	
	public function buscar($limit=30){
		$this->layout 		= 'ajax';
		$this->autoRender	= false;
				
		$busca = $this->request->query['busca'];
		
		$doenca = $this->Doencas->find('list', [
			'conditions' => [
				'Doencas.nome LIKE' => '%'.$busca.'%',
			],
			'limit' => $limit,
			'keyField' => 'id', 
			'valueField' => 'nome',
		])->hydrate(false);
		
		if ( $doenca->count() > 0 ) {
			$retorno	= [];
			foreach ( $doenca as $d_id => $d_nome ) {
				$item['value']	= $d_id;
				$item['label']	= $d_nome;
				$retorno[]	= $item;
			}
		}

		$json = json_encode($retorno);
		//if ( $this->request->is('requested') ) {
			$this->response->body($json);
			return $this->response;
		//}
	}

}