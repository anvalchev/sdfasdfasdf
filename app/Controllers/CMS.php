<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use League\CommonMark\MarkdownConverter;

class CMS extends BaseController
{
    public function index(...$slug)
    {
        $file = new \CodeIgniter\Files\File(ROOTPATH . 'content/' . implode('/', $slug) . '.md', true);
        $markdown = $file->openFile()->fread($file->getSize());

        $config = [];

        $environment = new Environment($config);
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new FrontMatterExtension());

        $converter = new MarkdownConverter($environment);
        // // $converter = new GithubFlavoredMarkdownConverter($environment);

        $result = $converter->convert($markdown);

        if ($result instanceof RenderedContentWithFrontMatter) {
            $frontMatter = $result->getFrontMatter();
        }

        $data = [
            'pageMeta' => $frontMatter,
            'pageContent' => $result->getContent(),
        ];

        return view('cms/' . $frontMatter['type'], $data);
    }
}
