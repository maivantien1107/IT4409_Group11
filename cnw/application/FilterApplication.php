<?php
require_once ROOT . DS . 'mvc' . DS . 'models' . DS . 'products' . DS . 'Laptop.php';
require_once ROOT . DS . 'application' . DS . 'products' . DS . 'LaptopApplication.php';

class FilterApplication extends LaptopApplication
{
   public function getAll()
   {   
    $result=array();
    $result1=array();
    $result2=array();
    $result3=array();
    $result4=array();
    $result5=array();
    $result6=array();
    $listcard1=array();
    $tmp=0;
    $listProducts=parent::getAll();
       if (isset($_GET['nha-san-xuat'])){
        $supplier=addslashes($_GET['nha-san-xuat']);
        if($supplier=='all'){
            $result=$listProducts;
            $tmp=1;
        }
        else {
            $supplier=explode(',',$supplier);
            foreach($supplier as $supplier1){
                foreach($listProducts as $product){
                    if(strpos($product->getSupplier(),$supplier1) !== false){  

                        $result[]=$product;
                        $tmp++;
                    }
                }
        }
    }

       }
       else {
        $result=$listProducts;
        $tmp=1;
       }
       if (isset($_GET['muc-gia'])){
        $listprice=addslashes($_GET['muc-gia']);
        if ($listprice=='all'){
            $result1=$result;
            $tmp=1;
        }
        else{
            $listprice=explode(',',$listprice);
            foreach($listprice as $price)
                {
                switch(intval($price)){
                    case 1: 
                        foreach($result as $product){
                            if ($product->getPrice()< 10000000){
                                $result1[]=$product;
                                $tmp++;
                            }
                        }
                        break;
                    case 2: 
                        foreach($result as $product){
                            if( $product->getPrice()>=10000000 && $product->getPrice()<15000000){
                                $result1[]=$product;
                                $tmp++;
                            }
                        }
                        break;
                    case 3: 
                        foreach($result as $product){
                            if($product->getPrice()>=15000000 && $product->getPrice()<20000000){
                                $result1[]=$product;
                                $tmp++;
                            }
                        }
                        break;
                    case 4: 
                        foreach($result as $product){
                            if ($product->getPrice()>=20000000 && $product->getPrice()<25000000){
                                $result1[]=$product;
                                $tmp++;
                            }
                        }
                        break;
                    case 5:
                        foreach($result as $product){
                            if ($product->getPrice()>=25000000){
                                $result1[]=$product;
                                $tmp++;
                            }
                        }
                        break;
                }
        }
        }                           
       }
       else {
        $result1=$result;
        $tmp=1;
       }
       if (isset($_GET['man-hinh'])){
        $listscreem1=addslashes($_GET['man-hinh']);
        if ($listscreem1=='all'){
            $result2=$result1;
            $tmp=1;
        }
        else {
            $listscreem1=explode(',',$listscreem1);
            foreach($listscreem1 as $screem1){
                switch(intval($screem1)) {
                    case 13:
                        foreach($result1 as $product){
                            $scr=$product->getScreen();
                            $src=explode(' ', $scr);
                            $tmp=intval($src[0]);
                            if ($tmp < 14){
                                $result2[]=$product;
                                $tmp++;
        
                            }
                        }
                        break;
                    case 14: 
                        foreach($result1 as $product){
                            $scr=$product->getScreen();
                            $src=explode(' ', $scr);
                            $tmp=intval($src[0]);
                            if ($tmp < 15 && $tmp>=14){
                                $result2[]=$product;
                                $tmp++;
        
                            }
                        }
                        break;
                    case 15:
                        foreach($result1 as $product){
                            $scr=$product->getScreen();
                            $src=explode(' ', $scr);
                            $tmp=intval($src[0]);
                            if ($tmp >=15){
                                $result2[]=$product;
                                $tmp++;
        
                            }
                        }
                        break;
        
                }
    

            }
           
        }

        
       }
       else {
        $result2=$result1;
        $tmp=1;
       }
       if (isset($_GET['CPU'])){
        $listcpu=addslashes($_GET['CPU']);
        if ($listcpu=='all'){
            $result3=$result2;
            $tmp=1;
        }
        else {
            $listcpu=explode(',',$listcpu);
            foreach($listcpu as $cpu){
                foreach($result2 as $product){
                    if (strpos($product->getCpu(),$cpu) !== false){
                        $result3[]=$product;
                        $tmp++;
                    }
                }

            }
        }
       
       }
       else{
        $result3=$result2;
        $tmp=1;
       }
       if (isset($_GET['RAM'])){
        $listram=addslashes($_GET['RAM']);
        if ($listram=='all'){
            $result4=$result3;
            $tmp=1;
        }
        else {
            $listram=explode(',',$listram);
            foreach($listram as $ram){
                foreach($result3 as $product){
           
                    if (strpos($product->getRam(),$ram) !== false){
                        $result4[]=$product;
                        $tmp++;
        
                    }
                }
            }
        }
        
       }
       else {
        $result4=$result3;
        $tmp=1;
       }
       if (isset($_GET['o-cung'])){
        $listmemory=addslashes($_GET['o-cung']);
        if ($listmemory=='all'){
            $result5=$result4;
            $tmp=1;
        }
        else {
            $listmemory=explode(',',$listmemory);
            foreach($listmemory as $memory){
                foreach($result4 as $product){
                    if (strpos($product->getMemory(),$memory) !== false){
                        $result5[]=$product;
                        $tmp++;
                    }
                }
            }
        }
       }
       else {
        $result5=$result4;
        $tmp=1;
       }
       if (isset($_GET['Card-do-hoa'])){
        $listcard=addslashes($_GET['Card-do-hoa']);
        if ($listcard=='all'){
            $result6=$result5;
            $tmp=1;
        }
        else {
            $listcard1=explode(',',$listcard);
           
            foreach($listcard1 as $card){
                $card_tmp=explode(' ',$card);
                foreach($result5 as $product){
                    $card1=$product->getCard();
                    if (strpos($card1,$card_tmp[0]) !== false){
                        $result6[]=$product;
                        $tmp++;
                    }
                }
            }
        }
        
       }
      
       else {
        $result6=$result5;
        $tmp=1;
       }
       if ($tmp>0){
        $listProducts=$result6;
        return $listProducts;
       }
       else {
        return null;
       }
   }
   public function getUrl(){
    $data=array();
    if (isset($_GET['nha-san-xuat'])){
        $data['nha-san-xuat']=addslashes($_GET['nha-san-xuat']);
    }
    if (isset($_GET['muc-gia'])){
        $data['muc-gia']=addslashes($_GET['muc-gia']); 
    }
    if (isset($_GET['man-hinh'])){
        $data['man-hinh']=addslashes($_GET['man-hinh']);
    }
    if (isset($_GET['CPU'])){
        $data['CPU']=addslashes($_GET['CPU']);

    }
    if (isset($_GET['RAM'])){
        $data['RAM']=addslashes($_GET['RAM']);
    }
    if (isset($_GET['o-cung'])){
        $data['o-cung']=addslashes($_GET['o-cung']); 
    }
    if (isset($_GET['Card-do-hoa'])){
        $data['Card-do-hoa']=addslashes($_GET['Card-do-hoa']);
    }
    return $data;
   }
   //hàm xử lý href của lefl sidebar_products
   //ex $label=nha-san-xuat
   public function getHref($label,$supplier){
    $data_url=self::getUrl();
    $result='';
    $tmp_url='';
    foreach($data_url as $key => $value){
        if ($key==$label){
            $tmp_url=$value;}
        else {
             $result=$result."".$key."=".$value."&";
            }
    }
    $result=$result."".$label."=";
    if (strpos($tmp_url,$supplier) !== false){
        if (strpos($tmp_url,$supplier)==0){
            $tmp_url= str_replace($supplier.",",'',$tmp_url);
            $tmp_url= str_replace($supplier,'',$tmp_url);    
        }
        else{
                                                     
            $tmp_url= str_replace(",".$supplier,'',$tmp_url);
        }
        if ($tmp_url==''){ $tmp_url='all';}
        $result=$result."". $tmp_url;
     }
    else {
        if ($tmp_url=='all'){
            $result=$result."". $supplier;
        }
        elseif ($tmp_url==''){ $result=$result."".$supplier;}
        else{
            $result=$result."". $tmp_url.",".$supplier;}
    }
    return $result;
   }
   //hàm lấy href của button tất cả
   public function getHrefALL($label){
    $data_url=self::getUrl();
    $result='filter&';
    $tmp_url='';
    foreach($data_url as $key => $value){
        if ($key==$label){
            $tmp_url='all';
        }
        else {
             $result=$result."".$key."=".$value."&";
            }
    }
    $result=$result."".$label."=$tmp_url";
    return $result;

   }
 
   //hàm check để thêm class active 
   public function check($label,$supplier){
    $data=self::getUrl();
    if (isset($data[$label])){
    $data_label=$data[$label];
    $data_label=explode(',',$data_label);
    foreach($data_label as $value){
        if ($value==$supplier){
            return true;
        }
    }}
    return false;

   }
   public function checkAll($label){
    $data=self::getUrl();
    if(isset($data[$label])){
        if ($data[$label]==''){
            return true;
        }
        else{
        return false;}
    }
    else {
        return true;
    }
   }
}
