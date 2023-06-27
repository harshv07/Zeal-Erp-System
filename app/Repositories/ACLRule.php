<?php

namespace App\Repositories;



use Alexusmai\LaravelFileManager\Services\ACLService\ACLRepository;
use App\Helpers\Qs;
use App\Models\branch;
use BeyondCode\QueryDetector\Outputs\Alert;
use Illuminate\Support\Facades\Auth;

//use Your Model

/**
 * Class ACLRule.
 */
class ACLRule implements ACLRepository
{
    /**
     * Get user ID
     *
     * @return mixed
     */
    public function getUserID()
    {
        return Auth::user();
    }

    /**
     * Get rules from file-manger.php config file
     *
     * @return array
     */


    // * 'path' => 'folder-name'
    // * 'path' => 'folder1*' - select folder1, folder12, folder1/sub-folder, ...
    // * 'path' => 'folder2/*' - select folder2/sub-folder,... but not select folder2 !!!
    // * 'path' => 'folder-name/file-name.jpg'
    // * 'path' => 'folder-name/*.jpg'
    // *
    // * * - wildcard
    // *
    // * access: 0 - deny, 1 - read, 2 - read/write

    public function getRules(): array
    {
        // return config('file-manager.aclRules')[$this->getUserID()] ?? [];
        $user = Auth::user();
        $disk = Qs::getmaindisk();

        if ($user->hasRole('SuperAdmin') || $user->hasRole('Admin')) {

            return [

                ['disk' => $disk, 'path' => '*', 'access' => 2],
            ];
        }
        $userbranch = $user->branch->name;
        $branches = branch::all();

        $arr = [
            ['disk' => $disk, 'path' => '/', 'access' => 1],
            ['disk' => $disk, 'path' => 'Placement', 'access' => 1],
            ['disk' => $disk, 'path' => 'Placement/*', 'access' => 2],
        ];

        foreach ($branches as $branch) {
            array_push($arr, ['disk' => $disk, 'path' => $branch->name, 'access' => 1]);
            array_push($arr, ['disk' => $disk, 'path' => $branch->name . '/Notes', 'access' => 1]);
            array_push($arr, ['disk' => $disk, 'path' => $branch->name . '/UploadSection', 'access' => 1]);
            array_push($arr, ['disk' => $disk, 'path' => $branch->name . '/Notes/*', 'access' => 2]);
            array_push($arr, ['disk' => $disk, 'path' => $branch->name . '/UploadSection/*', 'access' => 1]);
            array_push($arr, ['disk' => $disk, 'path' => $branch->name . '/*', 'access' => 2]);
        }

        if ($user->hasRole('Teacher')) {

            return $arr;
        }

        if ($user->hasRole('Student')) {

            $arr =  [
                ['disk' => $disk, 'path' => '/', 'access' => 1],
                ['disk' => $disk, 'path' => $userbranch, 'access' => 1],
                ['disk' => $disk, 'path' =>  $userbranch . '/Notes/*', 'access' => 1],
                ['disk' => $disk, 'path' =>  $userbranch . '/UploadSection/*', 'access' => 2],
                ['disk' => $disk, 'path' => $userbranch . '/*', 'access' => 1],

            ];


            if ($user->hasPermissionTO('view_placement')) {
                array_push($arr, ['disk' => $disk, 'path' => 'Placement*', 'access' => 1]);
            }

            return $arr;
        } else {
            $arr = [
                ['disk' => $disk, 'path' => '/', 'access' => 1],
                ['disk' => $disk, 'path' => $userbranch . '*', 'access' => 1],
                ['disk' => $disk, 'path' => $userbranch . 'Notes', 'access' => 1],
                ['disk' => $disk, 'path' => $userbranch . '/UploadSection', 'access' => 1],
                ['disk' => $disk, 'path' => $userbranch . '/UploadSection/*', 'access' => 2],
            ];

            if ($user->hasPermissionTo('notes_branch')) {
                array_push($arr, ['disk' => $disk, 'path' => $userbranch . 'Notes/*', 'access' => 2],);
            } else {
                array_push($arr, ['disk' => $disk, 'path' => $userbranch . 'Notes/*', 'access' => 1],);
            }

            if ($user->hasPermissionTo('notes_placement')) {
                array_push($arr, ['disk' => $disk, 'path' => $userbranch . 'Notes/*', 'access' => 2],);
            } else {
                array_push($arr, ['disk' => $disk, 'path' => $userbranch . 'Notes/*', 'access' => 1],);
            }
        }
    }
}
