<?php

namespace Wchojnacki\ExampleMenuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Wchojnacki\ExampleMenuBundle\Entity\Menu;

class LoadData implements FixtureInterface
{
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
    {

        $xml = simplexml_load_file(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . 'data/menu.xml');
        foreach ($xml->option as $p) {
            $menu = new Menu();
            $menu->setTitle($p->title);
            $menu->setContent($p->content);
            $manager->persist($menu);
        }
        $manager->flush();

    }
}

