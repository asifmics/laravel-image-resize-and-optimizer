use Intervention\Image\Facades\Image;
function doUploadImage($name=null, $path, $photo, $optimizePath, $width=null, $height=null, $format, $unlink = null): string
{

    $imageName = $name . '.' . $format;
    $path = public_path("$path/$imageName");
    $pathOptimize = public_path("$optimizePath/$imageName");
    Image::make( $photo )->encode($format)->save( $path );
    Image::make( $photo )->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    })->save( $pathThumbs );
   // ImageOptimizer::optimize($pathOptimize);
    return $imageName ;
}
