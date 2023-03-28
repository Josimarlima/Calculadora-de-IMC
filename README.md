<h1>Aplicação para cálculo de IMC</h1>
<p>Esta é uma aplicação simples em PHP que permite calcular o índice de massa corporal (IMC) e outras informações relacionadas a partir da entrada do usuário. A aplicação utiliza programação orientada a objetos (POO) e uma arquitetura MVC (Model-View-Controller) básica. Além disso, utiliza o banco de dados MySQL para armazenar os registros dos usuários.</p>
<h2>Tecnologias utilizadas</h2>
<ul>
  <li>PHP</li>
  <li>MySQL</li>
  <li>POO</li>
  <li>Arquitetura MVC</li>
</ul>
<h2>Como fazer o deploy da aplicação usando container</h2>
<p>Para fazer o deploy da aplicação usando container, é necessário seguir os seguintes passos:</p>
<ol>
  <li>Clonar este repositório para a máquina local.</li>
  <li>Na raiz do projeto, executar o comando <code>docker build -t calculadora-imc .</code> para criar a imagem do container.</li>
  <li>Em seguida, executar o comando <code>docker run -p 8080:80 calculadora-imc</code> para rodar o container na porta 8080.</li>
</ol>
<h2>Como fazer o deploy da aplicação somente com o XAMPP</h2>
<p>Para fazer o deploy da aplicação somente com o XAMPP, é necessário seguir os seguintes passos:</p>
<h3>Windows</h3>
<ol>
  <li>Baixar e instalar o XAMPP para Windows.</li>
  <li>Clonar este repositório para a pasta C:\xampp\htdocs.</li>
  <li>Iniciar o XAMPP e habilitar os módulos Apache e MySQL.</li>
  <li>Acessar http://localhost/calculadora-imc no navegador para acessar a aplicação.</li>
</ol>
<h3>Linux e Mac</h3>
<ol>
  <li>Baixar e instalar o XAMPP para Linux ou Mac.</li>
  <li>Clonar este repositório para a pasta /opt/lampp/htdocs.</li>
  <li>Iniciar o XAMPP e habilitar os módulos Apache e MySQL.</li>
  <li>Acessar http://localhost/calculadora-imc no navegador para acessar a aplicação.</li>
</ol>
<h2>Funcionalidades da aplicação</h2>
<p>A aplicação permite que o usuário informe sua altura e peso para calcular o IMC, peso ideal e classificação. Além disso, a aplicação permite que o usuário visualize todos os registros já cadastrados e exclua um registro específico.</p>
<h2>Validações</h2>
<p>A aplicação realiza algumas validações para garantir a correta inserção dos dados. São elas:</p>
<ul>
  <li>Altura e peso devem ser números;</li>
  <li>A altura não pode ser maior que 3 metros.</li>
</ul>
<h2>Conclusão</h2>
<p>Esta é uma aplicação simples que mostra como é possível utilizar POO e MVC em uma aplicação PHP. Além disso, a aplicação utiliza o banco de dados MySQL para armazenar os registros dos usuários. A aplicação pode ser facilmente implantada em um ambiente de desenvolvimento local usando XAMPP ou container Docker. A aplicação também possui validações simples para garantir que os dados inseridos pelo usuário sejam válidos. Esta é uma boa base para projetos mais complexos que envolvam cálculos e armazenamento de dados relacionados à saúde e fitness.</p>
