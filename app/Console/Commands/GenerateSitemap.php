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
            ->add($appurl . '/' . $indexImages)
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
        $imageXml = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';
        $spells = Spell::all();
        foreach ($spells as $key => $spell) {
            if(!empty($spell->img)) {
                $type = Type::findOrFail($spell->type_id);
                $spell_url = $appurl . '/' . $type->type_url . '/' . $spell->spell_url;
                $spell_image_url = $appurl . '/storage/' . $spell->img;
                $image_title = $spell->name;

$imageXml .= '
    <url>
        <loc>' . $spell_url  . '</loc>
        <image:image>
            <image:loc>'. $spell_image_url . '</image:loc>
            <image:title><![CDATA[ '. $image_title . ' ]]></image:title>
        </image:image>
    </url>';
            }
        }
$imageXml .='
</urlset>';

        $myfile = fopen(public_path("images.xml"), "w");
        fwrite($myfile, $imageXml);
        fclose($myfile);
    }  
}