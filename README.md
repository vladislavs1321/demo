test app
====

to load fixtures run 
       
      php app/console demo:load
      php app/console fos:elastica:populate

if you want to create new service for search
 
        #services.yml
        your_search_service:
            class: YourServiceClass
            tags:
                -  { name: searcher_item }

and implement `\AppBundle\Service\SearchableInterface`