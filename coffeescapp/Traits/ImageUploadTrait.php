<?php
namespace App\Traits;
use Illuminate\Http\Request;
Use Image;
use Intervention\Image\Exception\NotReadableException;
use App\Utilities\AppConstants;
use Exception;

trait ImageUploadTrait
{
    public function saveImageTrait($filename , $image_path , $image_thumb_path ,$name)
    {
        try
        {
            $files = $filename;
            if ($files !="") {
                $ImageUpload = Image::make($files);
                $originalPath = $image_path; 
                // $ImageUpload->save($originalPath.time().$files->getClientOriginalName());
                $ImageUpload->resize(AppConstants::IMAGE_FULL_WIDTH,AppConstants::IMAGE_FULL_HEIGHT);
                $ImageUpload->save($originalPath.$name.".".$files->getClientOriginalExtension());
                // for saving thumnail image
                $thumbnailPath = $image_thumb_path;
                $ImageUpload->resize(AppConstants::IMAGE_WIDTH_THUMB,AppConstants::IMAGE_HEIGHT_THUMB);
                $ImageThumb = $ImageUpload->save($thumbnailPath.$name.".".$files->getClientOriginalExtension());
                $files->getClientOriginalExtension();
            }
            return $ImageThumb->basename;
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('failPMsg','Unable to add  image. Please try again.'); 
        }
    }

    public function saveImageTrait_bk(Request $request,$sku)
    {
        try
        {
            
            if ($files = $request->file('base_image')) {
                $ImageUpload = Image::make($files);
                $originalPath = AppConstants::IMAGE_PATH;
                //$ImageUpload->save($originalPath.time().$files->getClientOriginalName());
                $ImageUpload->resize(AppConstants::IMAGE_FULL_WIDTH,AppConstants::IMAGE_FULL_HEIGHT);
                $ImageUpload->save($originalPath.$sku.".".$files->getClientOriginalExtension());
                // for save thumnail image
                $thumbnailPath = AppConstants::IMAGE_THUMB_PATH;
                $ImageUpload->resize(AppConstants::IMAGE_WIDTH_THUMB,AppConstants::IMAGE_HEIGHT_THUMB);
                $ImageThumb = $ImageUpload->save($thumbnailPath.$sku.".".$files->getClientOriginalExtension());
                //$ImageThumb = $ImageUpload->save($thumbnailPath.time().$files->getClientOriginalName());
                //dd($ImageThumb->basename);
                $files->getClientOriginalExtension();
            }
            return $ImageThumb->basename;
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('failPMsg','Unable to add  product. Please try again.'); 
        }
    }



    public function saveDetailImageTrait(Request $request,$sku)
    {
        try
        {
            if ($FILESLIST = $request->file('additional_image'))
            {
                $i=0;
                foreach($FILESLIST as $filesdetails)
                {
                    $ImageUpload   = Image::make($filesdetails);
                    $originalPath  = AppConstants::IMAGE_DETAIL_PATH;
                    $ImageUpload->resize(AppConstants::IMAGE_FULL_WIDTH,AppConstants::IMAGE_FULL_HEIGHT);
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

}