<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Country;
use App\Entity\MusicGenre;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use SplFileObject;
use Symfony\Component\HttpFoundation\File\File;

use function Symfony\Component\Clock\now;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = \Faker\Factory::create('es_ES');


        $file = new File(__DIR__ . '/files/pays.csv');

        $paysCsv = $file->openFile();
        $paysCsv->setFlags(SplFileObject::READ_CSV);
        $paysCsv->setCsvControl(",");
        $countriesnames = [];

        foreach ($paysCsv as $line) {
            if (isset($line[5])) {
                $country = new Country();
                $country->setName($line[5]);
                $manager->persist($country);
            }
        }


        $categoriesName = ['Viajes', 'Cultura', 'Comida'];
        $categories = [];

        foreach ($categoriesName as $categoryName) {

            $category = new Category();
            $category->setName($categoryName);
            $categories[] = $category;
            $manager->persist($category);
        }


        for ($i = 0; $i < 30; $i++) {
            $article = new Article();
            $article->setTitle($faker->realText(20))
                ->setContent($faker->realTextBetween(250, 500))
                ->setCreatedAt(new DateTimeImmutable('now'))
                ->setCategory($faker->randomElement($categories));

            $manager->persist($article);
        }

        $musicgenresName= ['rock', 'pop', 'jazz', 'classic', 'punk', 'metal', 'grunge', 'pop-rock', 'folk'];
        $genres=[];

        foreach ($musicgenresName as $musicgenre){
            $genre = new MusicGenre();
            $genre->setGenderName($musicgenre);
            $genres[] = $genre;
            $manager->persist($genre);
        }


        $manager->flush();
    }
}
