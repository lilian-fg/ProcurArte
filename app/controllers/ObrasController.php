<?php
use models\Obra;
use models\Modelo;
use models\Artista;
use models\Colecionador;

class ObrasController {

	
	function index($id = null){

		#variáveis que serao passados para a view
		$send = [];

		#cria o model
		$model = new Obra();
		
		
		$send['data'] = null;
		#se for diferente de nulo é porque estou editando o registro
		if ($id != null){
			#então busca o registro do banco
			$send['data'] = $model->findById($id);
		}

		#busca todos os registros
		$send['lista'] = $model->all();

        #recupera a lista com todos os modelos
        $modelosModel = new Modelo();
        $send['modelos'] = $modelosModel->all();

		
        #recupera a lista com todos os usuarios
        $usuModel = new Artista();
        $send['artistas'] = $usuModel->all();


		#se estiver editando um veiculo
		if ($id != null){
			#recupera todos os motoristas já setados para esse veiculo
			$send['colecionadores'] = $model->getColecionadores($id);
		}
		

		#$send['tipos'] = [0=>"Escolha uma opção", 1=>"Usuário comum", 2=>"Admin"];

		#chama a view
		render("obras", $send);
	}

	
	function salvar($id=null){

		$model = new Obra();
		
		if ($id == null){
			$id = $model->save($_POST);
		} else {
			$id = $model->update($id, $_POST);
		}

		#se a id de um usuario/motorista tiver sido enviada
		if (_v($_POST,'colecionador_id')){
			$model = new Colecionadores();
			$dados = ["artista_id"=> $_POST['colecionador_id'], "obra_id"=>$id];
			$model->save($dados);
		}
		
		
		redirect("obras/index/$id");
	}

	function deletar(int $id){
		
		$model = new Obra();
		$model->delete($id);

		redirect("obras/index/");
	}

	function deletarColecionador(int $idDoRelacionamento){
       
        $model = new Colecionador();
        $rel = $model->findById($idDoRelacionamento);
        $model->delete($idDoRelacionamento);

        redirect("obras/index/{$rel['obra_id']}");
    }


}