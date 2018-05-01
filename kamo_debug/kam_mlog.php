<?PHP
/**
* MyLogクラス
* 使い方

指定ディレクトリにログファイルを記述する
$log = new Mlog();
$log -> write($string , Mylog::OK) 
$log -> write($string , Mylog::ERROR) 

var_dump関数の実行内容をvar_dump.logファイルに書き出す
$var = debug_trace();
$log->var_dump($var);

* end
**/

define('KAMO_THIS_PHP_CURRENT_DIR' , dirname(__FILE__));
class Mlog{

    private $LOGDIR = KAMO_THIS_PHP_CURRENT_DIR.'/logs';
    private $OKLOGDIR = 'ok_log';
    private $ERRORLOGDIR = 'error_log';
    private $DUMPLOGDIR = 'dump';
    const ERROR = true;
    const OK = false;
    
    //コンストラクタ
    function __construct(){
        $this -> mkLogdir();
    }
    private function mkLogdir(){
        
        //ログ格納用のディレクトリを確認・作成する
        //親フォルダの存在確認
        if(file_exists ($this -> LOGDIR)){
            //親フォルダが存在すれば実行
            
            //error用ディレクトリの作成
            $errordir = $this -> LOGDIR . '/' . $this -> ERRORLOGDIR;
            if(!file_exists($errordir)){
                mkdir($errordir , 0750 ,true);
            }
            //ok用ディレクトリ作成
            $okdir = $this -> LOGDIR . '/' . $this -> OKLOGDIR;
            if(!file_exists($okdir)){
                mkdir($okdir , 0750 ,true);
            }
            //var_dump用のディレクトリ作成
            $dumpdir = $this -> LOGDIR . '/' . $this -> DUMPLOGDIR;
            if(!file_exists($dumpdir)){
                mkdir($dumpdir , 0750 ,true);
            }
        }else{
            //LOGFILESフォルダが存在しない場合--作成する
            //第二引数はパーミッション
            //第三引数は階層構造のディレクトリ作成の許可
            mkdir($this -> LOGDIR , 0750 ,true);
            
            //もう一度この関数を呼び出して下位のディレクトリを作成する
            $this -> mkLogdir();
        }
    }
    private function getCurrentDate(){
        date_default_timezone_set('Asia/Tokyo');        //date_default_timezone_setでphp.iniの設定をそのスクリプト実行中だけ既定値を上書き
        $date = new DateTime();
        return $date->format('Y-m-d');
    }
    private function getCurrentTime(){
        date_default_timezone_set('Asia/Tokyo');        //date_default_timezone_setでphp.iniの設定をそのスクリプト実行中だけ既定値を上書き
        $date = new DateTime();
        return $date->format('H:i:s');
    }
    public function write($logString , $isError ){
        //呼び出し元の関数名を取得
        $debug = debug_backtrace();
        $d = $debug[0];
        
        $dlog = $d['file'] .','. $d['line'];        
        
        $log = $this -> getCurrentTime() .  ',' .$logString . ',' . $dlog . PHP_EOL;
        
        //書き込みディレクトリの指定
        if($isError){
        //エラーの場合
            $logDir = $this -> LOGDIR . '/' . $this -> ERRORLOGDIR;
        }else{
        //成功の場合
            $logDir = $this -> LOGDIR . '/' . $this -> OKLOGDIR;
        }
        
        //ファイルの書き込み
        //ファイル名を「日.log」とする
        $filename = $this -> getCurrentDate().'.log';
        //FILE_APPEND フラグはファイルの最後に追記すること
        //LOCK_EX フラグは他の人が同時にファイルに書き込めないこと
        file_put_contents($logDir.'/'.$filename,$log,FILE_APPEND | LOCK_EX);
    }
    
    //var_dump();の内容をファイルに記述する
    /**
    引数：var_dump()を実行する対象
    */
    public function var_dump($target){
        //準備：ディレクトリと保存ファイルの指定
        $log_dir = $this->LOGDIR . '/' . $this->DUMPLOGDIR;
        $filename = 'var_dump.log';
        
        //ob_start関数は通常ブラウザに出力される情報をバッファと呼ばれる領域に保存しあとから取り出すことができるようにする関数です。
        //出力を行う前にob_start()を実行し、var_dump($arr)で配列の中身をバッファに出力します。
        //この時点ではブラウザに出力されません。
        //その後にバッファからデータを取り出すことができる関数のob_get_contents()を実行し、結果を$resultに保存します。$resultにはvar_dump($arr)の結果が保存されます。
        //最後にob_end_clean()でバッファの中身を削除します。
        //あとは、通常通り$resultの中身をdump.txtへ書き込みます。
        ob_start();
        var_dump($target);
        $result =ob_get_contents();
        ob_end_clean();
        
        //dumpの結果に「日時」を追記する
        $dump_header = '====================================' . "\n";
        $dump_header = $dump_header . $this->getCurrentDate().  "\n";
        $dump_header = $dump_header . $this->getCurrentTime() . "\n";
        
        //dump結果に呼び出し元の関数名などを追記
        $debug = debug_backtrace()[0];
        $func_file = $debug['file'];
        $func_line = $debug['line'];
        $func_name = $debug['function'];
        $func_arguments = is_null($debug['args'])? $debug['args']:'なし';
        
        
        //dump_header作成
        $dump_header = $dump_header . "ファイル名 : " . $func_file . "\n";
        $dump_header = $dump_header . "行 : " . $func_line . "\n";
        $dump_header = $dump_header . "関数名 : " . $func_name . "\n";
        $dump_header = $dump_header . "引数 : " . $func_arguments . "\n";   
        $dump_header = $dump_header . '====================================' . "\n";
        
        
        
        //dump結果にfooter追記
        $dump_footer = '------------- end ---------------' . "\n\n";
        
        $result = $dump_header . $result . $dump_footer;
        
        //ファイルへの書き出し：追記モードで。
        file_put_contents($log_dir. '/' . $filename,$result ,FILE_APPEND | LOCK_EX);
        
        
    }
}
