<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\ProductImages;
use App\Traits\ImageUploadTrait;
use App\Traits\rolePermissionTrait;
use App\Utilities\AppConstants;
Use Image;
use DB;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Exception\NotReadableException;
use PhpParser\Node\Stmt\Catch_;

class AdminProductController extends Controller
{
    /******* Trait   ******/
    use ImageUploadTrait;
    use rolePermissionTrait;

    public function addProduct(Request $request)
    {
        if(!$this->checkRolePermission('ADD_PRODUCT'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        $currencyList = (new Currency())->getAllCurrencies();
        $currencyListAll = ['currencyListAll' => $currencyList ];
        return view('auth/admin/addproduct' , $currencyListAll);
    }

    public function saveProduct(Request $request)
    {
        $request->file('base_image');
        $pricesList   = $request->priceList;
        $currencyList = $request->currency;
        for($i=0; $i<sizeof($pricesList); $i++)
        {
            $price_currency_list[$i] = (
                array( 'price'=> $pricesList[$i], 'currency' => $currencyList[$i])
            );
        }

        
        $request->validate([
            "name"        => "required",
            'base_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            "description" => "required",
            "sku"         => "required|min:8|max:8",
            "priceList"   => "required|array",
            "priceList.*" => "required|min:2",
            "status"      => "required",
        ]);
            
        try
        {
            
            $currencyList = (new Currency())->getAllCurrencies();
            $currencyListAll = ['currencyListAll' => $currencyList ];
            if($request->file('base_image') != "")
            {
                // using trait....
                $imageSaved = $this->saveImageTrait($request->file('base_image') , AppConstants::IMAGE_PATH,AppConstants::IMAGE_THUMB_PATH,$request->sku);
            }
            else
            {
                // if no image provided then use dummy image
                $imageSaved = 'dummy.jpg';
            }

            
            // Check Product SKU...
            // $skuAlreadypresent = "";
            $skuAlreadypresent = Product::where('sku', $request->sku)->first();
            
            if(isset($skuAlreadypresent['id']))
            {
                return redirect()->back()->with('failPMsg','Product sku already exists.');
            }
          


            $product = new Product();
            $product->name  = $request->name;
            $product->image = $imageSaved;
            $product->description = $request->description;
            $product->sku    = $request->sku;
            $product->thumbnail = $imageSaved;
            $product->status = $request->status;
            $queryproduct = $product->save();

            if(isset($product->id) && $product->id !="" && $product->id !=null) 
            {
                foreach($price_currency_list as $pclist)
                {   
                    $productPrice = new ProductPrice();
                    $productPrice->product_id = $product->id;
                    $productPrice->item_price = $pclist['price'];
                    $productPrice->currency_id =  $pclist['currency'];
                    $queryProductPrice = $productPrice->save();
                }
                if(!empty($request->additional_image))
                {
                    $detailImagList = $this->saveDetailImageTrait($request,$request->sku);
                    // old working code without trait...
                    // $detailImagList = $this->saveDetailImage($request,$request->sku);
                    foreach($detailImagList as $dlist)
                    {
                        $productImage = new ProductImages();
                        $productImage->product_id = $product->id;
                        $productImage->detail_image     = $dlist;
                        $productImage->detail_thumbnail = $dlist;
                        $additional_image = $productImage->save();
                    }
                }

                return redirect()->back()->with('successPMsg','Product has been added successfully.');
            }
            else
            {
                return redirect()->back()->with('failPMsg','Unable to add  product. Please try again.');
            }
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('failPMsg','Unable to add  product. Please try again.'.$e);
        }
    }

    

    public function saveDetailImage(Request $request,$sku)
    {
        try
        {
            if ($FILESLIST = $request->file('additional_image')) {
                $i=0;
                foreach($FILESLIST as $filesdetails)
                {
                    $ImageUpload = Image::make($filesdetails);
                    $originalPath = AppConstants::IMAGE_DETAIL_PATH;
                    $ImageUpload->save($originalPath.$sku."_".$i.".".$filesdetails->getClientOriginalExtension());
                    $thumbnailPath = AppConstants::IMAGE_THUMB_DETAIL_PATH;
                    $ImageUpload->resize(AppConstants::IMAGE_WIDTH_THUMB,AppConstants::IMAGE_HEIGHT_THUMB);
                    $ImageThumb = $ImageUpload->save($thumbnailPath.$sku."_".$i.".".$filesdetails->getClientOriginalExtension());
                    $ImageUploadedList[$i] = $ImageThumb->basename;
                    $i++;
                }
            }
            return $ImageUploadedList;
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('failPMsg','Unable to add  product. Please try again.');
        }

    }



    public function saveImage(Request $request,$sku)
    {
        try
        {
            if ($files = $request->file('base_image')) {
                $ImageUpload = Image::make($files);
                $originalPath = AppConstants::IMAGE_PATH;
                $ImageUpload->save($originalPath.$sku.".".$files->getClientOriginalExtension());
                $thumbnailPath = AppConstants::IMAGE_THUMB_PATH;
                $ImageUpload->resize(AppConstants::IMAGE_WIDTH_THUMB,AppConstants::IMAGE_HEIGHT_THUMB);
                $ImageThumb = $ImageUpload->save($thumbnailPath.$sku.".".$files->getClientOriginalExtension());
                $files->getClientOriginalExtension();
            }
            return $ImageThumb->basename;
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('failPMsg','Unable to add  product. Please try again.'); 
        }
    }

    public function saveImage_bk(Request $request,$sku)
    {
        if ($files = $request->file('base_image')) {
            $ImageUpload = Image::make($files);
            $originalPath = AppConstants::IMAGE_PATH;
            $ImageUpload->save($originalPath.time().$files->getClientOriginalName());
            $thumbnailPath = AppConstants::IMAGE_THUMB_PATH;
            $ImageUpload->resize(AppConstants::IMAGE_WIDTH_THUMB,AppConstants::IMAGE_HEIGHT_THUMB);
            $ImageThumb = $ImageUpload->save($thumbnailPath.time().$files->getClientOriginalName());
            $files->getClientOriginalExtension();
        }
        return $ImageThumb->basename;
    }

    public function deleteImage(Request $request)
    {
        if ($files = $request->file('base_image')) {
            $ImageUpload = Image::make($files);
            $originalPath = AppConstants::IMAGE_PATH;
            $ImageUpload->save($originalPath.$sku.".".$files->getClientOriginalExtension());
            $thumbnailPath = AppConstants::IMAGE_THUMB_PATH;
            $ImageUpload->resize(AppConstants::IMAGE_WIDTH_THUMB,AppConstants::IMAGE_HEIGHT_THUMB);
            $ImageThumb = $ImageUpload->save($thumbnailPath.$sku.".".$files->getClientOriginalExtension());
            $ImageThumb->destroy();
        }
        return $ImageThumb->basename;
    }

    public function productList(Request $request)
    {
        if(!$this->checkRolePermission('VIEW_PRODUCT_LIST'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        $productInfoDetails = (new Product)->getProductList();
        $dataProductInfoDetail = [
            'dataProductDetailInfo' => $productInfoDetails,
        ];
        return view('auth.admin.productlist' , $dataProductInfoDetail);
    }

    public function productDetail($id)
    {
        if(!$this->checkRolePermission('EDIT_PRODUCT'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        
        $productPricesDetails = DB::table('products')
                ->join('product_price', 'products.id', '=', 'product_price.product_id')
                ->Join('currency', 'product_price.currency_id', '=', 'currency.id')
                ->select('products.name','products.sku','products.image','products.description','product_price.item_price',  'currency.code')
                ->where('products.id', $id  )
                ->get();
        

        $productImagesDetails = DB::table('products')
               
                ->Join('product_images', 'product_images.product_id', '=', 'products.id')
                ->select('products.name','products.sku','products.image','products.description',
                'product_images.detail_image', 'product_images.detail_thumbnail')
                ->where('products.id', $id  )
                ->get();


                $dataProductInfoDetail = [
                    'priceProductDetailInfo' => $productPricesDetails,
                    'imageProductDetailInfo' => $productImagesDetails,
                ];

                return view('auth.admin.productdetail' , $dataProductInfoDetail);
    }

   

    public function destroy(Request $request)
    {
        if(!$this->checkRolePermission('DELETE_PRODUCT'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        $ddelList = DB::table('products')
                ->LeftJoin('product_images', 'product_images.product_id', '=', 'products.id')
                ->select('products.image','products.thumbnail',
                'product_images.detail_image', 'product_images.detail_thumbnail')
                ->where('products.id', $request->id )
                ->get();
        foreach($ddelList as $delImages)
        {
            $files = array();
            $image_bpath =  AppConstants::IMAGE_PATH.$delImages->image;
            if(File::exists($image_bpath) && ( $delImages->image != "" && $delImages->image != null)){
                $files[0] = $image_bpath;
            }
            $image_bpath_thumb =  AppConstants::IMAGE_THUMB_PATH.$delImages->thumbnail;
            if(File::exists($image_bpath_thumb) && ( $delImages->thumbnail !="" && $delImages->thumbnail !=null ) ){
                $files[1] = $image_bpath_thumb;
            }

            $image_detailpath =  AppConstants::IMAGE_DETAIL_PATH.$delImages->detail_image;
            if(File::exists($image_detailpath) && ( $delImages->detail_image !="" && $delImages->detail_image !=null )){
                $files[2] = $image_detailpath;
            }

            $image_detailpath_thumb =  AppConstants::IMAGE_THUMB_DETAIL_PATH.$delImages->detail_thumbnail;
            if(file_exists($image_detailpath_thumb) && $delImages->detail_thumbnail != '' && $delImages->detail_thumbnail != null){
                $files[3] = $image_detailpath_thumb;
            }
            if(!empty($files)) {
                // File::delete($files);
            }
        }

         

        if($request->id) {
            try {

                

                $prod_id_deleted = Product::destroy($request->id);
                echo 'testing';
                if($prod_id_deleted == 1){
                    DB::table('product_images')->where('product_id', $request->id)->delete();
                }
            }
            catch(Exception $e){
                echo $e;
            }
        }
    }

     
}
