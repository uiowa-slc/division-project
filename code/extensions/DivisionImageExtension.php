<?php
class DivisionImageExtension extends DataExtension {
	
    public function Exif(){
        //http://www.v-nessa.net/2010/08/02/using-php-to-extract-image-exif-data
        $image = $this->AbsoluteURL;
        $d=new ArrayList();    
        $exif = exif_read_data($image, 0, true);
        foreach ($exif as $key => $section) {
            $a=new ArrayList();    
            foreach ($section as $name => $val)
                $a->push(new ArrayData(array("Title"=>$name,"Content"=>$val)));
            $d->push(new ArrayData(array("Title"=>strtolower($key),"Content"=>$a)));
        }
        return $d;
    }

}
