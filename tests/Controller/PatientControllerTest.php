<?php

namespace App\Test\Controller;

use App\Entity\Patient;
use App\Repository\PatientRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PatientControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private PatientRepository $repository;
    private string $path = '/patient/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Patient::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Patient index');

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
            'patient[nomPatient]' => 'Testing',
            'patient[prénomPatient]' => 'Testing',
            'patient[emailPatient]' => 'Testing',
            'patient[adressPatient]' => 'Testing',
            'patient[numtelPatient]' => 'Testing',
            'patient[motdepasselPatient]' => 'Testing',
            'patient[agePatient]' => 'Testing',
            'patient[gendrePatient]' => 'Testing',
            'patient[isblokedpatient]' => 'Testing',
            'patient[nbRdv]' => 'Testing',
            'patient[nbAchat]' => 'Testing',
            'patient[nbReclamation]' => 'Testing',
        ]);

        self::assertResponseRedirects('/patient/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Patient();
        $fixture->setNomPatient('My Title');
        $fixture->setPrénomPatient('My Title');
        $fixture->setEmailPatient('My Title');
        $fixture->setAdressPatient('My Title');
        $fixture->setNumtelPatient('My Title');
        $fixture->setMotdepasselPatient('My Title');
        $fixture->setAgePatient('My Title');
        $fixture->setGendrePatient('My Title');
        $fixture->setIsblokedpatient('My Title');
        $fixture->setNbRdv('My Title');
        $fixture->setNbAchat('My Title');
        $fixture->setNbReclamation('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Patient');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Patient();
        $fixture->setNomPatient('My Title');
        $fixture->setPrénomPatient('My Title');
        $fixture->setEmailPatient('My Title');
        $fixture->setAdressPatient('My Title');
        $fixture->setNumtelPatient('My Title');
        $fixture->setMotdepasselPatient('My Title');
        $fixture->setAgePatient('My Title');
        $fixture->setGendrePatient('My Title');
        $fixture->setIsblokedpatient('My Title');
        $fixture->setNbRdv('My Title');
        $fixture->setNbAchat('My Title');
        $fixture->setNbReclamation('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'patient[nomPatient]' => 'Something New',
            'patient[prénomPatient]' => 'Something New',
            'patient[emailPatient]' => 'Something New',
            'patient[adressPatient]' => 'Something New',
            'patient[numtelPatient]' => 'Something New',
            'patient[motdepasselPatient]' => 'Something New',
            'patient[agePatient]' => 'Something New',
            'patient[gendrePatient]' => 'Something New',
            'patient[isblokedpatient]' => 'Something New',
            'patient[nbRdv]' => 'Something New',
            'patient[nbAchat]' => 'Something New',
            'patient[nbReclamation]' => 'Something New',
        ]);

        self::assertResponseRedirects('/patient/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNomPatient());
        self::assertSame('Something New', $fixture[0]->getPrénomPatient());
        self::assertSame('Something New', $fixture[0]->getEmailPatient());
        self::assertSame('Something New', $fixture[0]->getAdressPatient());
        self::assertSame('Something New', $fixture[0]->getNumtelPatient());
        self::assertSame('Something New', $fixture[0]->getMotdepasselPatient());
        self::assertSame('Something New', $fixture[0]->getAgePatient());
        self::assertSame('Something New', $fixture[0]->getGendrePatient());
        self::assertSame('Something New', $fixture[0]->getIsblokedpatient());
        self::assertSame('Something New', $fixture[0]->getNbRdv());
        self::assertSame('Something New', $fixture[0]->getNbAchat());
        self::assertSame('Something New', $fixture[0]->getNbReclamation());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Patient();
        $fixture->setNomPatient('My Title');
        $fixture->setPrénomPatient('My Title');
        $fixture->setEmailPatient('My Title');
        $fixture->setAdressPatient('My Title');
        $fixture->setNumtelPatient('My Title');
        $fixture->setMotdepasselPatient('My Title');
        $fixture->setAgePatient('My Title');
        $fixture->setGendrePatient('My Title');
        $fixture->setIsblokedpatient('My Title');
        $fixture->setNbRdv('My Title');
        $fixture->setNbAchat('My Title');
        $fixture->setNbReclamation('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/patient/');
    }
}
