<?php
namespace App\ListenerFileUpload;
use App\File;
use Unisharp\Laravelfilemanager\Events\ImageIsRenaming;
class RenameImage
{
    /**
     * Handle the ImageIsRenaming event.
     * If the image that is to be renamed exists inside the file_paths table,
     * rename the file path in the database to reflect the new file name.
     *
     * @param  ImageIsRenaming  $event
     * @return void
     */
    public function handle(ImageIsRenaming $event)
    {
        // Get the old and new file path from the event object
        $oldFilePath = str_replace(public_path(), "", $event->oldPath());
        $newFilePath = str_replace(public_path(), "", $event->newPath());
        // Search for database records containing the old path
        // And update the record with the new file path
        File::where('id', 30)->update(['link' => $newFilePath]);
    }
}