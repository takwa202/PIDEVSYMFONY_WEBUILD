<?php

namespace App\Test\Controller;

use App\Entity\Medecin;
use App\Repository\MedecinRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MedecinControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private MedecinRepository $repository;
    private string $path = '/medecin/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Medecin::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Medecin index');

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
            'medecin[mdpMed]' => 'Testing',
            'medecin[emailMed]' => 'Testing',
            'medecin[dateNaissanceMed]' => 'Testing',
            'medecin[ageMed]' => 'Testing',
            'medecin[adresseMed]' => 'Testing',
            'medecin[genreMed]' => 'Testing',
            'medecin[nomMed]' => 'Testing',
            'medecin[prenomMed]' => 'Testing',
            'medecin[numTelMed]' => 'Testing',
            'medecin[photoMed]' => 'Testing',
            'medecin[photoDip]' => 'Testing',
            'medecin[nbRecMed]' => 'Testing',
            'medecin[nbPatient]' => 'Testing',
            'medecin[isBlocked]' => 'Testing',
            'medecin[spéciatilte]' => 'Testing',
        ]);

        self::assertResponseRedirects('/medecin/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Medecin();
        $fixture->setMdpMed('My Title');
        $fixture->setEmailMed('My Title');
        $fixture->setDateNaissanceMed('My Title');
        $fixture->setAgeMed('My Title');
        $fixture->setAdresseMed('My Title');
        $fixture->setGenreMed('My Title');
        $fixture->setNomMed('My Title');
        $fixture->setPrenomMed('My Title');
        $fixture->setNumTelMed('My Title');
        $fixture->setPhotoMed('My Title');
        $fixture->setPhotoDip('My Title');
        $fixture->setNbRecMed('My Title');
        $fixture->setNbPatient('My Title');
        $fixture->setIsBlocked('My Title');
        $fixture->setSpéciatilte('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Medecin');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Medecin();
        $fixture->setMdpMed('My Title');
        $fixture->setEmailMed('My Title');
        $fixture->setDateNaissanceMed('My Title');
        $fixture->setAgeMed('My Title');
        $fixture->setAdresseMed('My Title');
        $fixture->setGenreMed('My Title');
        $fixture->setNomMed('My Title');
        $fixture->setPrenomMed('My Title');
        $fixture->setNumTelMed('My Title');
        $fixture->setPhotoMed('My Title');
        $fixture->setPhotoDip('My Title');
        $fixture->setNbRecMed('My Title');
        $fixture->setNbPatient('My Title');
        $fixture->setIsBlocked('My Title');
        $fixture->setSpéciatilte('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'medecin[mdpMed]' => 'Something New',
            'medecin[emailMed]' => 'Something New',
            'medecin[dateNaissanceMed]' => 'Something New',
            'medecin[ageMed]' => 'Something New',
            'medecin[adresseMed]' => 'Something New',
            'medecin[genreMed]' => 'Something New',
            'medecin[nomMed]' => 'Something New',
            'medecin[prenomMed]' => 'Something New',
            'medecin[numTelMed]' => 'Something New',
            'medecin[photoMed]' => 'Something New',
            'medecin[photoDip]' => 'Something New',
            'medecin[nbRecMed]' => 'Something New',
            'medecin[nbPatient]' => 'Something New',
            'medecin[isBlocked]' => 'Something New',
            'medecin[spéciatilte]' => 'Something New',
        ]);

        self::assertResponseRedirects('/medecin/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getMdpMed());
        self::assertSame('Something New', $fixture[0]->getEmailMed());
        self::assertSame('Something New', $fixture[0]->getDateNaissanceMed());
        self::assertSame('Something New', $fixture[0]->getAgeMed());
        self::assertSame('Something New', $fixture[0]->getAdresseMed());
        self::assertSame('Something New', $fixture[0]->getGenreMed());
        self::assertSame('Something New', $fixture[0]->getNomMed());
        self::assertSame('Something New', $fixture[0]->getPrenomMed());
        self::assertSame('Something New', $fixture[0]->getNumTelMed());
        self::assertSame('Something New', $fixture[0]->getPhotoMed());
        self::assertSame('Something New', $fixture[0]->getPhotoDip());
        self::assertSame('Something New', $fixture[0]->getNbRecMed());
        self::assertSame('Something New', $fixture[0]->getNbPatient());
        self::assertSame('Something New', $fixture[0]->getIsBlocked());
        self::assertSame('Something New', $fixture[0]->getSpéciatilte());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Medecin();
        $fixture->setMdpMed('My Title');
        $fixture->setEmailMed('My Title');
        $fixture->setDateNaissanceMed('My Title');
        $fixture->setAgeMed('My Title');
        $fixture->setAdresseMed('My Title');
        $fixture->setGenreMed('My Title');
        $fixture->setNomMed('My Title');
        $fixture->setPrenomMed('My Title');
        $fixture->setNumTelMed('My Title');
        $fixture->setPhotoMed('My Title');
        $fixture->setPhotoDip('My Title');
        $fixture->setNbRecMed('My Title');
        $fixture->setNbPatient('My Title');
        $fixture->setIsBlocked('My Title');
        $fixture->setSpéciatilte('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/medecin/');
    }
}
