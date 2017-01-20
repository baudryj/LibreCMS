<?php
class vCard{
  protected $data=array(
    'display_name'          => NULL,
    'first_name'            => NULL,
    'last_name'             => NULL,
    'additional_name'       => NULL,
    'name_prefix'           => NULL,
    'name_suffix'           => NULL,
    'nickname'              => NULL,
    'title'                 => NULL,
    'role'                  => NULL,
    'department'            => NULL,
    'company'               => NULL,
    'work_po_box'           => NULL,
    'work_extended_address' => NULL,
    'work_address'          => NULL,
    'work_city'             => NULL,
    'work_state'            => NULL,
    'work_postal_code'      => NULL,
    'work_country'          => NULL,
    'home_po_box'           => NULL,
    'home_extended_address' => NULL,
    'home_address'          => NULL,
    'home_city'             => NULL,
    'home_state'            => NULL,
    'home_postal_code'      => NULL,
    'home_country'          => NULL,
    'office_tel'            => NULL,
    'home_tel'              => NULL,
    'cell_tel'              => NULL,
    'fax_tel'               => NULL,
    'pager_tel'             => NULL,
    'email1'                => NULL,
    'email2'                => NULL,
    'url'                   => NULL,
    'photo'                 => NULL,
    'birthday'              => NULL,
    'timezone'              => NULL,
    'sort_string'           => NULL,
    'note'                  => NULL,
  );
  protected $filename;
  protected $class;
  protected $revision_date;
  protected $card;
  public function set($key,$value=null){
    if(is_array($key)){
      foreach($key as$_key=>$_value){
        $this->data[$_key]=trim($_value);
      }
    }elseif(!is_null($value))$this->data[$key]=trim($value);
    return$this;
  }
  protected function build(){
    if(!$this->class)$this->class='PUBLIC';
    if(!$this->data['display_name'])$this->data['display_name']=$this->data['first_name'].' '.$this->data['last_name'];
    if(!$this->data['sort_string'])$this->data['sort_string']=$this->data['last_name'];
    if(!$this->data['sort_string'])$this->data['sort_string']=$this->data['company'];
    if(!$this->data['timezone'])$this->data['timezone']=date("O");
    if(!$this->revision_date)$this->revision_date=date('Y-m-d H:i:s');
    $this->card="BEGIN:VCARD\r\n";
    $this->card.="VERSION:3.0\r\n";
    $this->card.="CLASS:".$this->class."\r\n";
    $this->card.="PRODID:-//class_vCard from WhatsAPI//NONSGML Version 1//EN\r\n";
    $this->card.="REV:".$this->revision_date."\r\n";
    $this->card.="FN:".$this->data['display_name']."\r\n";
    $this->card.="N:".$this->data['last_name'].";".$this->data['first_name'].";".$this->data['additional_name'].";".$this->data['name_prefix'].";".$this->data['name_suffix']."\r\n";
    if($this->data['nickname'])$this->card.="NICKNAME:".$this->data['nickname']."\r\n";
    if($this->data['title'])$this->card.="TITLE:".$this->data['title']."\r\n";
    if($this->data['company'])$this->card.="ORG:".$this->data['company'];
    if($this->data['department'])$this->card.=";".$this->data['department'];
    $this->card.="\r\n";
    if($this->data['work_po_box']||$this->data['work_extended_address']||$this->data['work_address']||$this->data['work_city']||$this->data['work_state']||$this->data['work_postal_code']||$this->data['work_country']){
      $this->card.="ADR;type=WORK:".$this->data['work_po_box'].";".$this->data['work_extended_address'].";".$this->data['work_address'].";".$this->data['work_city'].";".$this->data['work_state'].";".$this->data['work_postal_code'].";".$this->data['work_country']."\r\n";
  	}
    if($this->data['home_po_box']||$this->data['home_extended_address']||$this->data['home_address']||$this->data['home_city']||$this->data['home_state']||$this->data['home_postal_code']||$this->data['home_country']){
      $this->card.="ADR;type=HOME:".$this->data['home_po_box'].";".$this->data['home_extended_address'].";".$this->data['home_address'].";".$this->data['home_city'].";".$this->data['home_state'].";".$this->data['home_postal_code'].";".$this->data['home_country']."\r\n";
    }
    if($this->data['email1'])$this->card.="EMAIL;type=INTERNET,pref:".$this->data['email1']."\r\n";
    if($this->data['email2'])$this->card.="EMAIL;type=INTERNET:".$this->data['email2']."\r\n";
    if($this->data['office_tel'])$this->card.="TEL;type=WORK,voice:".$this->data['office_tel']."\r\n";

    if($this->data['home_tel'])$this->card.="TEL;type=HOME,voice:".$this->data['home_tel']."\r\n";
    if ($this->data['cell_tel'])$this->card.="TEL;type=CELL,voice:".$this->data['cell_tel']."\r\n";
    if($this->data['fax_tel'])$this->card.="TEL;type=WORK,fax:".$this->data['fax_tel']."\r\n";
    if($this->data['pager_tel'])$this->card.="TEL;type=WORK,pager:".$this->data['pager_tel']."\r\n";
    if($this->data['url'])$this->card.="URL;type=WORK:".$this->data['url']."\r\n";
    if($this->data['birthday'])$this->card.="BDAY:".$this->data['birthday']."\r\n";
    if($this->data['role'])$this->card.="ROLE:".$this->data['role']."\r\n";
    if($this->data['note'])$this->card.="NOTE:".$this->data['note']."\r\n";
    $this->card.="TZ:".$this->data['timezone']."\r\n";
    $this->card.="END:VCARD\r\n";
  }
  public function download($filename=null){
    if(!$this->card)$this->build();
    $this->filename=preg_replace('/\s+/','_',($filename?$filename:$this->data['display_name']));
    header("Content-type: text/directory");
    header("Content-Disposition: attachment; filename=".$this->filename.".vcf");
    header("Pragma: public");
    echo$this->card;
  }
  public function show(){
    if(!$this->card)$this->build();
      return$this->card;
    }
}