<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ResourceFileRequest;
use App\Http\Requests\ResourceCreateFolderRequest;
use App\Models\Resources;

class Resource extends Controller
{
    protected $manager;

    public function __construct(UploadService $manager)
    {
        $this->manager = $manager;
    }

    /**
     * 目录文件列表
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $folder = $request->get('folder');
        $data = $this->manager->folderInfo($folder);

        return view('admin.resource.index', $data);
    }

    /**
     * 创建新目录
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param ResourceCreateFolderRequest $request
     * @return void
     */
    public function createFolder(ResourceCreateFolderRequest $request)
    {
        $new_folder = $request->get('new_folder');
        $folder = $request->get('folder') . '/' . $new_folder;

        $result = $this->manager->createDirectory($folder);

        if ($result === true) {
            return redirect()
                ->back()
                ->with('success', '目录「' . $new_folder . '」创建成功.');
        }

        $error = $result ?: "创建目录出错.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * 删除文件
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param Request $request
     * @return void
     */
    public function deleteFile(Request $request)
    {
        $del_file = $request->get('del_file');
        $path = $request->get('folder') . '/' . $del_file;

        $result = $this->manager->deleteFile($path);

        if ($result === true) {
            // 资源表中记录删除文件
            Resources::where('name', $del_file)->first()->delete();

            return redirect()
                ->back()
                ->with('success', '文件「' . $del_file . '」已删除.');
        }

        $error = $result ?: "文件删除出错.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    public function destroy(Request $request)
    {
        return $request->get('del_folder') ? $this->deleteFolder($request) : $this->deleteFile($request);
    }

    /**
     * 删除目录
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param Request $request
     * @return void
     */
    public function deleteFolder(Request $request)
    {
        $del_folder = $request->get('del_folder');
        $folder = $request->get('folder') . '/' . $del_folder;

        $result = $this->manager->deleteDirectory($folder);

        if ($result === true) {
            return redirect()
                ->back()
                ->with('success', '目录「' . $del_folder . '」已删除');
        }

        $error = $result ?: "An error occurred deleting directory.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }

    /**
     * 上传文件
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param ResourceFileRequest $request
     * @return void
     */
    public function uploadFile(ResourceFileRequest $request)
    {
        $file = $_FILES['file'];

        // 文件hash值
        $hash = hash_file('md5', $file['tmp_name']);

        // 文件后缀
        $ext = pathinfo($file['name'])['extension'];

        // 判断上传文件名
        $fileName = $request->get('file_name');
        if ($fileName) {
            $pathinfo = pathinfo($fileName);
            $fileName .= ($pathinfo['extension'] ?? '') != $ext ? sprintf(".%s", $ext) : '';
        } 
        else {
            $fileName = $file['name'];
        }

        // 文件路径
        $path = str_finish($request->get('folder'), '/') . $fileName;
        $content = File::get($file['tmp_name']);

        // 判断图片是否已存在
        if (Resources::where('hash', $hash)->first()) {
            return redirect()
                ->back()
                ->withErrors(['该文件已存在']);
        }

        // 上传图片
        $result = $this->manager->saveFile($path, $content);

        if ($result === true) {
            // 资源表中记录新增文件
            Resources::create([
                'name' => $fileName,
                'hash' => $hash,
                'mime' => $file['type'],
                'path' => config('blog.uploads.webpath') . $path,
            ]);
            return redirect()
                ->back()
                ->with("success", '文件「' . $fileName . '」上传成功.');
        }

        $error = $result ?: "文件上传出错.";
        return redirect()
            ->back()
            ->withErrors([$error]);
    }
}
