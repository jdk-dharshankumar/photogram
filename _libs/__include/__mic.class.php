<? 

class mic{

    public $brand;
    public $color;
    public $model;

public function getbrand($brand){

        $this->brand =$brand;         // thus function is used to print obj vales
}

public function getmodel(){         // this function is used to print the reversed string 
    return $this -> model;              // generted from below function
}
                                            
public function setmodel($model){                //this function is used to receive the string model
    $this -> model = strrev($model);                 //  and reverse the string
}

public static function test(){
    print("this is static fn");           // this fn does not need any object it runs without cretating a object
}

}
