<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\Tags\Sitemap;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $appurl = config('app.url');
        $sitemapFile = 'sitemap.xml';
        // modify this to your own needs

        SitemapGenerator::create($appurl)
            ->writeToFile(public_path($sitemapFile));
    /*
        SitemapGenerator::create($appurl)
            ->getSitemap()
            // here we add one extra link, but you can add as many as you'd like
            ->add(Url::create('/kerai')->setPriority(0.5))
            ->writeToFile(public_path($sitemapFile));
      */      
    }
}