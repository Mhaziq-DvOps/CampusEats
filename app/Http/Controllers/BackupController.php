<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    public function index()
    {
        $allBackups = [];

        foreach (config('backup.backup.destination.disks') as $disk_name) {
            $disk = Storage::disk($disk_name);
            $files = $disk->allFiles();

            foreach ($files as $f) {
                if (substr($f, -4) === '.zip' && $disk->exists($f)) {
                    $allBackups[] = [
                        'file_path'     => $f,
                        'file_name'     => str_replace('backups/', '', $f),
                        'file_size'     => $disk->size($f),
                        'last_modified' => $disk->lastModified($f),
                        'disk'          => $disk_name,
                    ];
                }
            }
        }

        $allBackups = array_reverse($allBackups);
        return view("backup.backups")->with(['backups' => $allBackups]);
    }

    public static function humanFileSize($size, $unit = "")
    {
        if ((!$unit && $size >= 1 << 30) || $unit == "GB")
            return number_format($size / (1 << 30), 2) . " GB";
        if ((!$unit && $size >= 1 << 20) || $unit == "MB")
            return number_format($size / (1 << 20), 2) . " MB";
        if ((!$unit && $size >= 1 << 10) || $unit == "KB")
            return number_format($size / (1 << 10), 2) . " KB";
        return number_format($size) . " bytes";
    }

    public function create()
    {
        try {
            Artisan::call('backup:run --only-db');
            $output = Artisan::output();
            Log::info("Backup created successfully:\n" . $output);

            session()->flash('success', 'Successfully created backup!');
            return redirect()->back();
        } catch (Exception $e) {
            session()->flash('danger', $e->getMessage());
            return redirect()->back();
        }
    }

    public function download($file_path)
    {
        $diskName = config('backup.backup.destination.disks')[0]; // default to first disk
        $disk = Storage::disk($diskName);

        if (!$disk->exists($file_path)) {
            abort(404, "Backup file doesn't exist.");
        }

        $adapter = $disk->getDriver()->getAdapter();

        if (!($adapter instanceof \League\Flysystem\Adapter\Local)) {
            abort(403, "Only local downloads are supported.");
        }

        $storagePath = $adapter->getPathPrefix();
        $fullPath = $storagePath . $file_path;

        return response()->download($fullPath);
    }

    public function delete($file_name)
    {
        $diskName = config('backup.backup.destination.disks')[0]; // default to first disk
        $disk = Storage::disk($diskName);
        $file_path = 'backups/' . $file_name;

        if ($disk->exists($file_path)) {
            $disk->delete($file_path);
            session()->flash('delete', 'Successfully deleted backup!');
        } else {
            session()->flash('danger', 'Backup file not found!');
        }

        return redirect()->back();
    }
}
