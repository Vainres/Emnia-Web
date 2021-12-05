<?php 

class StoreFile{
    public function __tostring()
    {
        $DATA=$this->data->getData();
        return $this->data->getData().file_put_contents($this->fileName,$DATA);
    }
}
class ReadFile{
    public function getData()
    {
        return file_get_contents($this->fileName);
    }
}

?>