Back end
    Criar Migrations da Tela notícias:
        
        noticias,
        categoria_noticias,
        categorias_noticia_relations,
        noticias_documentos,

    Criar Telas
        Categoria
        Noticias
            Observações
                Ele poderá inserir 'n' categorias e 'n' documentos no momento da criação, sendo elas, não obrigatórias!
    
    Criar API : 
        /noticias/filters => ela deve trazer todas as categorias presentes em categoria_noticias, para filtragem no front-end
        /noticias => ela teve trazer as 10 primeiras notícias com paginação
        /noticias/{uuid} => ela deve trazer uma noticia específica com todos seus documentos e categorias
    
    Front end :
        desenvolver telas parecidas com  
            https://posse.go.gov.br/noticias/
            https://posse.go.gov.br/pnab-politica-nacional-aldir-blanc/


    Observação para rychard : 
        adicionar campo de uuid na tabela notícias
    
    Observação
        adicionar campo de uuid nas demais tabelas
        
