<?php
class HomeModel {
 
    public function index()
    {
        $data['title'] = 'Pagina principal';
        $this->views->getView('home', "index", $data);
    }

    public function portatiles()
    {
        $data['title'] = 'Portatiles';
        $this->views->getView('views', "portatiles", $data);
    }
    public function monitores()
    {
        $data['title'] = 'Monitores';
        $this->views->getView('views', "monitores", $data);
    }
    public function componentes()
    {
        $data['title'] = 'Componentes';
        $this->views->getView('views', "componentes", $data);
    }
    public function accesorios()
    {
        $data['title'] = 'Accesorios';
        $this->views->getView('views', "accesorios", $data);
    }
    public function torre()
    {
        $data['title'] = 'Torres';
        $this->views->getView('views', "torres", $data);
    }
}
 
?>