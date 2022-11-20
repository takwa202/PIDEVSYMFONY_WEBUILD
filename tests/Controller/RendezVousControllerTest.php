<?php

namespace App\Test\Controller;

use App\Entity\RendezVous;
use App\Repository\RendezVousRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RendezVousControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private RendezVousRepository $repository;
    private string $path = '/rendez/vous/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(RendezVous::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('RendezVou index');

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
            'rendez_vou[dateRd]' => 'Testing',
            'rendez_vou[heureRd]' => 'Testing',
            'rendez_vou[jourRestant]' => 'Testing',
            'rendez_vou[idPatient]' => 'Testing',
            'rendez_vou[idSym]' => 'Testing',
            'rendez_vou[idMed]' => 'Testing',
        ]);

        self::assertResponseRedirects('/rendez/vous/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new RendezVous();
        $fixture->setDateRd('My Title');
        $fixture->setHeureRd('My Title');
        $fixture->setJourRestant('My Title');
        $fixture->setIdPatient('My Title');
        $fixture->setIdSym('My Title');
        $fixture->setIdMed('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('RendezVou');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new RendezVous();
        $fixture->setDateRd('My Title');
        $fixture->setHeureRd('My Title');
        $fixture->setJourRestant('My Title');
        $fixture->setIdPatient('My Title');
        $fixture->setIdSym('My Title');
        $fixture->setIdMed('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'rendez_vou[dateRd]' => 'Something New',
            'rendez_vou[heureRd]' => 'Something New',
            'rendez_vou[jourRestant]' => 'Something New',
            'rendez_vou[idPatient]' => 'Something New',
            'rendez_vou[idSym]' => 'Something New',
            'rendez_vou[idMed]' => 'Something New',
        ]);

        self::assertResponseRedirects('/rendez/vous/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getDateRd());
        self::assertSame('Something New', $fixture[0]->getHeureRd());
        self::assertSame('Something New', $fixture[0]->getJourRestant());
        self::assertSame('Something New', $fixture[0]->getIdPatient());
        self::assertSame('Something New', $fixture[0]->getIdSym());
        self::assertSame('Something New', $fixture[0]->getIdMed());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new RendezVous();
        $fixture->setDateRd('My Title');
        $fixture->setHeureRd('My Title');
        $fixture->setJourRestant('My Title');
        $fixture->setIdPatient('My Title');
        $fixture->setIdSym('My Title');
        $fixture->setIdMed('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/rendez/vous/');
    }
}
