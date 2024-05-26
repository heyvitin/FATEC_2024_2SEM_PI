<?php 
    class PessoaController
    {
        #cada um dos metodos vai ser responsável por processar uma rota e serão  staticos

        #vai me devolver a lista de dados do usuario
        
        
        public static function telaIncial()
        {
           include 'App/View/modules/Pessoa/index.php';
        }
        
        
        public static function index()
        {
            include 'App/Model/PessoaModel.php';

            $model = new PessoaModel();
            $model->getAllRows();
            include 'App/View/modules/Pessoa/index.php';
            
        }

        
        public static function HomePaciente()
        {
            include 'App/view/modules/Pessoa/paciente.php';
        }
        public static function HomeMedico()
        {
            include 'App/view/modules/Pessoa/medico.php';
        }





        public static function form()
        {
            include 'App/Model/PessoaModel.php';
            $model = new PessoaModel();
          
            if(isset($_GET['id']))
                $model = $model->getById((int) $_GET['id']);//me ajuda a evitar ainda mais sql injection 
            
           
            

            include 'App/View/modules/Pessoa/cadastro.php';
        }


          
        public static function save()
        {





            include 'App/Model/PessoaModel.php';

            

            $model = new PessoaModel();
            $model->idPaciente =$_POST['idPaciente'];
            $model->nome = $_POST['nome'];
            $model->sobrenome = $_POST['sobrenome'];
            $model->cpf = $_POST['cpf'];
            $model->cep = $_POST['cep'];
            $model->estado = $_POST['estado'];
            $model->cidade = $_POST['cidade'];
            $model->rua = $_POST['rua'];
            $model->numero = $_POST['numero'];
            $model->tipoPessoa = $_POST['tipoPessoa'];
            $model->planoSaude = $_POST['planoSaude'];
          
            
            $model->save();


            header("Location: /pessoa");
        }


        public static function delete()
        {
            include 'App/Model/PessoaModel.php';
            $model = new PessoaModel();
            $model->delete((int) $_GET['id']);

            header("location: /pessoa");
        }





      /* public static function saveDescription()
        {
            include 'App/Model/PessoaModel.php';
            $model = new PessoaModel();
            $model->nome = $_POST['descricao'];


            header("Location: /paciente");
            
         
           
        }
        */
    }
?>