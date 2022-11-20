<?php

namespace App\Test\Controller;

use App\Entity\Symptome;
use App\Repository\SymptomeRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SymptomeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private SymptomeRepository $repository;
    private string $path = '/symptome/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Symptome::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Symptome index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'symptome[fievre]' => 'Testing',
            'symptome[toux]' => 'Testing',
            'symptome[fatigue]' => 'Testing',
            'symptome[douleurMusculaire]' => 'Testing',
            'symptome[malDeGorge]' => 'Testing',
            'symptome[essouflement]' => 'Testing',
            'symptome[perteDAppetit]' => 'Testing',
            'symptome[ecoulementNasal]' => 'Testing',
            'symptome[nausee]' => 'Testing',
            'symptome[vomissement]' => 'Testing',
            'symptome[malDeTete]' => 'Testing',
            'symptome[autre]' => 'Testing',
        ]);

        self::assertResponseRedirects('/symptome/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Symptome();
        $fixture->setFievre('My Title');
        $fixture->setToux('My Title');
        $fixture->setFatigue('My Title');
        $fixture->setDouleurMusculaire('My Title');
        $fixture->setMalDeGorge('My Title');
        $fixture->setEssouflement('My Title');
        $fixture->setPerteDAppetit('My Title');
        $fixture->setEcoulementNasal('My Title');
        $fixture->setNausee('My Title');
        $fixture->setVomissement('My Title');
        $fixture->setMalDeTete('My Title');
        $fixture->setAutre('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Symptome');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Symptome();
        $fixture->setFievre('My Title');
        $fixture->setToux('My Title');
        $fixture->setFatigue('My Title');
        $fixture->setDouleurMusculaire('My Title');
        $fixture->setMalDeGorge('My Title');
        $fixture->setEssouflement('My Title');
        $fixture->setPerteDAppetit('My Title');
        $fixture->setEcoulementNasal('My Title');
        $fixture->setNausee('My Title');
        $fixture->setVomissement('My Title');
        $fixture->setMalDeTete('My Title');
        $fixture->setAutre('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'symptome[fievre]' => 'Something New',
            'symptome[toux]' => 'Something New',
            'symptome[fatigue]' => 'Something New',
            'symptome[douleurMusculaire]' => 'Something New',
            'symptome[malDeGorge]' => 'Something New',
            'symptome[essouflement]' => 'Something New',
            'symptome[perteDAppetit]' => 'Something New',
            'symptome[ecoulementNasal]' => 'Something New',
            'symptome[nausee]' => 'Something New',
            'symptome[vomissement]' => 'Something New',
            'symptome[malDeTete]' => 'Something New',
            'symptome[autre]' => 'Something New',
        ]);

        self::assertResponseRedirects('/symptome/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getFievre());
        self::assertSame('Something New', $fixture[0]->getToux());
        self::assertSame('Something New', $fixture[0]->getFatigue());
        self::assertSame('Something New', $fixture[0]->getDouleurMusculaire());
        self::assertSame('Something New', $fixture[0]->getMalDeGorge());
        self::assertSame('Something New', $fixture[0]->getEssouflement());
        self::assertSame('Something New', $fixture[0]->getPerteDAppetit());
        self::assertSame('Something New', $fixture[0]->getEcoulementNasal());
        self::assertSame('Something New', $fixture[0]->getNausee());
        self::assertSame('Something New', $fixture[0]->getVomissement());
        self::assertSame('Something New', $fixture[0]->getMalDeTete());
        self::assertSame('Something New', $fixture[0]->getAutre());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Symptome();
        $fixture->setFievre('My Title');
        $fixture->setToux('My Title');
        $fixture->setFatigue('My Title');
        $fixture->setDouleurMusculaire('My Title');
        $fixture->setMalDeGorge('My Title');
        $fixture->setEssouflement('My Title');
        $fixture->setPerteDAppetit('My Title');
        $fixture->setEcoulementNasal('My Title');
        $fixture->setNausee('My Title');
        $fixture->setVomissement('My Title');
        $fixture->setMalDeTete('My Title');
        $fixture->setAutre('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/symptome/');
    }
}
