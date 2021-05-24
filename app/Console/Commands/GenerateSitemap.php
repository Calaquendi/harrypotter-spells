<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Type;
use App\Spell;

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
        $indexMenu = 'menu.xml';
        $indexSpells = 'spells.xml';
        $indexImages = 'images.xml';

        //generate sitemap.xml with index files
        SitemapIndex::create()
            ->add($appurl . '/' . $indexMenu)
            ->add($appurl . '/' . $indexSpells)
            //->add($appurl . '/' . $indexImages)
            ->writeToFile(public_path($sitemapFile));

        //generate menu.xml sitemap
        $menu_sitemap = Sitemap::create()
            ->add(Url::create('/'));
        $types = Type::all();
        foreach ($types as $type) {

            if($type->parent == 0) {
                $menu_sitemap->add(Url::create($type->type_url)->setPriority(0.8));
            }
            else {
                $parent = Type::findOrFail($type->parent);
                $url = $parent->type_url . '/' . $type->type_url;
                $menu_sitemap->add(Url::create($url)->setPriority(0.8)); 
            }
        }
        $menu_sitemap->writeToFile(public_path($indexMenu));

        //generate spells.xml sitemap
        $spells_sitemap = Sitemap::create();
        $spells = Spell::all();
        foreach ($spells as $spell) {
            $type = Type::findOrFail($spell->type_id);
            $spells_sitemap->add(Url::create($type->type_url . '/' . $spell->spell_url)->setPriority(0.9));
        }
        $spells_sitemap->writeToFile(public_path($indexSpells));

        //generate images.xml sitemap
        /*
        $images_sitemap = Sitemap::create();
        $spells = Spell::all();
        foreach ($spells as $key => $spell) {
            if ($key == 0) {
                $type = Type::findOrFail($spell->type_id);
                $images_sitemap->add(Url::create($type->type_url . '/' . $spell->spell_url)->setChangeFrequency(0)->setPriority(0));
                $images_sitemap->add("image");
                dump($spell->img);
            }
        }
        $images_sitemap->writeToFile(public_path($indexImages));
        */
    }
}