<?php

namespace App\Models\Enjaz;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentFile extends Model
{
    use HasFactory;

    protected $table = "content_files";

    protected $fillable = [
        'name',
        'description',
        'extension',
        'size',
        'mime',
        'path',
        'content_id',
        'created_at', 'updated_at'
    ];

    /**
     * @var string[] add new attribute to model
     */
    protected $appends = array('AttPath');

    public function content(){
        return $this->belongsTo(Content::class);
    }
    public function createContentFile($request,$folder)
    {
        $name = time() . rand(1, 100) . '.' . $request->image->extension();
        $content_file = ContentFile::create
        ([
            'name' => $name,
            'description' => $request->title,
            'extension' => $request->image->extension(),
            'size' => $request->image->getSize(),
            'mime' => $request->image->getMimeType(),
            'path' => $folder,
            'content_id' => $request->content_id,
        ]);
        $request['image']->storeAs(ContentFile::getSaveFilePath($folder,$content_file),ContentFile::getFileName($content_file));

    }
    public function updateContentFile($request,$folder,$id)
    {
        $name = time() . rand(1, 100) . '.' . $request->image->extension();
        $content_file = ContentFile::find($id);
        $content_file->update
        ([
            'name' => $name,
            'description' => $request->title,
            'extension' => $request->image->extension(),
            'size' => $request->image->getSize(),
            'mime' => $request->image->getMimeType(),
            'path' => $folder,
        ]);
        $request['image']->storeAs(ContentFile::getSaveFilePath($folder,$content_file),ContentFile::getFileName($content_file));

    }

    public static function getSaveFilePath($category, ContentFile $content_file)
    {
        return "/public/".ContentFile::getFileSubPath($category,  $content_file) ;
    }

    private static function getFileSubPath($category, ContentFile $content_file)
    {
        $date = $content_file->created_at;
        return "$category/$date->year/$date->month" ;

    }

    public static function getFileName(ContentFile $content_file)
    {
        return "$content_file->id.$content_file->extension" ;

    }
    /**
     * get path of resource file
     * @return string
     */
    public function getAttPathAttribute()
    {
        return ContentFile::getFilePath($this->path, $this) ;
    }
    public static function getFilePath($category, ContentFile $content_file)
    {
        return "/storage/".ContentFile::getFileSubPath($category,  $content_file)."/".ContentFile::getFileName($content_file);

    }
}
