<?php 
abstract class page 
{
    protected $html;

    public function __construct()
    {
        $this->html .= htmltage::htmlhead();
        $this->html .= '<link rel="stylesheet" href="styles.css">';
        $this->html .= htmltage::htmlbody();
    }
    public function __destruct()
    {
    	$this->html .= htmltage::htmlbodyend();
        $this->html .= htmltage::htmlend();
        stringfunction::printThis($this->html);
    }	

}

?>
 