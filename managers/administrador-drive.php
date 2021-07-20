<?php

include_once __DIR__ . '/../vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=../credenciales.json');

class AdministradorDrive{

    private $servicio;
    private $default_folder_id = "1jNL_ro_2FdAgG8ZUaw0q7ecWD8FQ1WYO";

    public function __construct(){
        $cliente = new Google_Client();
        $cliente->useApplicationDefaultCredentials();
        $cliente->setScopes(['https://www.googleapis.com/auth/drive.file']);
        $this->servicio = new Google_Service_Drive($cliente);
    }

    
    function subirArchivo( $ruta, $nombre_archivo, $mime_type){
        try{
            $file = new Google_Service_Drive_DriveFile();
            $file->setName($nombre_archivo);
            
            $file->setParents(array($this->default_folder_id));
            $file->setMimeType($mime_type);
            
            $result = $this->servicio->files->create(
                $file, 
                array(
                    'data' => file_get_contents($ruta),
                    'mimeType' => $mime_type,
                    'uploadType' => 'media',
                )
            );     
            return $result->id;   
        }catch(Google_Service_Exception $err){
            $m = json_decode($err->getMessage());
            echo $m->error->message;
        }catch(Exception $err){
            echo $err->getMessage();
        }
    }

    function borrarArchivosDeDrive(){
        try{
            $optParams = array(
                'fields' => "nextPageToken, files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType,parents)",
                'q' => "'". $this->default_folder_id ."' in parents"
                );
            $result = $this->servicio->files->listFiles($optParams);
            foreach($result as $elem){
                try{
                    $this->servicio->files->delete($elem->id);
                }catch(Exception $e){
                    print "An error ocurred: " . $e->getMessage();
                }
            }
            header("Refresh:0; url=index.php");
        
        }catch(Google_Service_Exception $err){
            $m = json_decode($err->getMessage());
            echo $m->error->message;
        }catch(Exception $err){
            echo $err->getMessage();
        }

    }
}
?>