ProManager
==========

Acompanhamento de Projetos

O ProManager é um sistema desenvolvido pela Coordenadoria de Tecnologia do Centro de Gestão da Tecnologia da Informação do Amapá, com a finalidade de acompanhar e gerir os projetos em execução pelos analistas.
Esta solução tem a missão de centralizar todos os Relatórios de Atendimento ao Cliente, pois através destes relatórios as demandas são geradas.
Para que este objetivo seja atingido, o ProManager conta com os módulos de:

1 - Cadastro da Instituição, Setores e Colaboradores<br />
Na área de Instituições, deve ser cadastrado o nome da Instituição em questão e alguma descrição, se necessário.
Logo após, uma tela de cadastro de Setores e Colaboradores será exibida.
Colaboradores são cadastrados por setor.

2 - Cadastro de Clientes e Solicitantes<br />
Na área de Clientes, é exibida uma lista de clientes cadastrados.
Clique em "Novo Cliente" e informe o nome da Instituição Cliente e alguma descrição, se necessário.
Logo após, uma tela de cadastro de Solicitantes será exibida.
Cadastre Nome, Cargo, Email e Telefone dos solicitantes de cada cliente.

3 - Administração de Projetos<br />
Na área de Projetos, é exibida uma lista com os projetos do respectivo colaborador.
Clique em "Novo Projeto" e cadastre um projeto informando um Título e uma Descrição e escolhendo o cliente e solicitante deste projeto.

4 - Cadastro de Relatórios de Atendimento ao Cliente e Demandas<br />
Após a criação dos Projetos, você pode administrar os Relatórios de Atendimento ao Cliente de cada Projeto.
Você poderá criar relatórios sem gerar demandas, ou relatórios que gerem demandas.
Na área dos projetos, encontre o projeto em que deseja criar o Relatório e no botão "Escolha uma ação", escolha a opção "Criar novo Relatório". Escolha qual tipo de relatório (Com Demandas / Sem Demandas) deseja criar.
Caso a escolha seja relatórios com demandas, a criação do mesmo se dá em duas fases.
Na primeira fase, devem ser informados o motivo do relatório (Ex. Criação de Web-site) e a Etapa em que o Projeto se encontra.
Na segunda fase, devem ser adicionadas todas as demandas deste projeto. Todo o diagnóstico da análise de requisitos para o projeto do cliente deve ser adicionado ao relatório em forma de demandas.
O relatório pode então ser impresso e entregue ao Cliente. Todos os relatórios ficarão guardados no sistema.
Caso um relatório sem demandas seja cadastrado, a sua criação se dá em apenas uma fase. Depois da confirmação dos dados, o relatório não poderá ser alterado.

5 - Acompanhamento das Demandas<br />
Na área dos projetos, encontre o projeto que deseja acompanhar e no botão "Escolha uma Ação", escolha a opção "Acompanhar Demandas".
Será exibida uma tela com três áreas onde as demandas serão carregadas: Não Iniciadas, Iniciadas, Finalizadas.
Primeiramente as demandas serão carregadas na área "Não Iniciadas".
No decorrer do seu trabalho, você poderá alterar o status das demandas do Projeto clicando e arrastando para a área que deseja. (Inciadas ou Finalizadas).
Há também a possibilidade de informar algum problema que ocorreu no desenvolvimento de alguma dessas demandas.
Na área do acompanhamento de demandas, clique em "Informar Problema". Um modal será exibido com um pequeno formulário.
Escolha a demanda que apresenta o problema, informe um titulo e detalhes sobre o problema em questão.
Na demanda com problema, uma etiqueta vermelha indicará o estado deste problema.
<br />
Esta solução foi desenvolvida em PHP e utiliza MySQL como banco de dados.
A área de demandas utiliza chamadas em Ajax para o deslocamentos dos posts para outras áreas.
<br />
Dúvidas? Entre em contato com samuelsilva@prodap.ap.gov.br
