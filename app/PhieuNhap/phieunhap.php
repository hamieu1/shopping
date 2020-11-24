<?php
namespace App\PhieuNhap;

/**
 * summary
 */
class PhieuNhap
{
    /**
     * summary
     */
    public $items = [];

    public $total_quantity = 0;
    public $total_amout = 0;
    public function __construct()
    {
        $this->items = session('phieunhap');
        $this->total_quantity = $this->total_quantity();
        $this->total_amout = $this->total_amout();
    }

    public function add($sanpham){
    	if(isset($this->items[$sanpham->id])){
    		$this->items[$sanpham->id]['qty'] += 1;
    	}
    	else{
    		$this->items[$sanpham->id] = [
	    		'id' => $sanpham->id,
	    		'name' => $sanpham->Name,
	    		'price' => $sanpham->GiaNhap,
	    		'qty' => 1,
	    		'image' => $sanpham->AnhChinh
    		];
    	}
    	
    	session(['phieunhap' => $this->items]);
    }

    public function delete($id){
    	if(isset($this->items[$id])){
    		unset($this->items[$id]);
    	}
    	session(['phieunhap' => $this->items]);
    }

    public function update($id, $qty){
    	if(isset($this->items[$id])){
    		$this->items[$id]['qty'] = $qty;
    	}
    	session(['phieunhap' => $this->items]);
    }

    protected function total_quantity(){
    	$t = 0;
    	if(session()->has('phieunhap')){
	    	foreach ($this->items as $items) {
	    		$t = $t + $items['qty'];
	    	}
    	}
   
    	return $t;
    }

    protected function total_amout(){
    	$t = 0;
    	if(session()->has('phieunhap')){
	    	foreach ($this->items as $items) {
    			$t = $t + $items['qty'] * $items['price'];
    		}
    	}
    
    	return $t;
    }
}

?>