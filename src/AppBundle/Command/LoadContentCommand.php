<?php


namespace AppBundle\Command;

use AppBundle\Entity\Text;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class LoadContentCommand
 *
 * @author Vladislav Shishko <13thMerlin@gmail.com>
 */
class LoadContentCommand extends ContainerAwareCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setName('demo:load')
            ->setDescription('load data from fixture file to db')
        ;
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $this->getContainer()->getParameter('fixtures_source_path');

        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');


        $conn = $em->getConnection();

        $sql = "INSERT INTO `text` (`id`, `content`) VALUES (NULL, LOAD_FILE('".realpath($path)."'))";

        $stmt = $conn->prepare($sql);
        $stmt->execute();


        $text = new Text();
        $text->setContent('lorem is so cool');

        $em->persist($text);
        $em->flush();
    }

}