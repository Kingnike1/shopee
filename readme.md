# **Plataforma de Divulgação de Produtos Afiliados - Shopee**

Este projeto tem como objetivo criar um site elegante e automatizado para divulgar produtos afiliados da Shopee, permitindo que o administrador cadastre e gerencie os produtos facilmente, enquanto os visitantes podem visualizar e acessar os links de compra.

---

## **1. Área Administrativa (Backoffice)**
Essa área será acessível apenas pelo administrador e permitirá o gerenciamento dos produtos.

### **Funcionalidades:**
- **Login do Administrador:**
  - Um sistema simples de autenticação (e-mail e senha) para acessar a área administrativa.

- **Cadastro de Produtos:**
  - Formulário para adicionar novos produtos, com os seguintes campos:
    - Nome do produto
    - Descrição do produto
    - Link de afiliado da Shopee
    - Upload de imagem do produto
    - Categoria (opcional, para organização)

- **Listagem de Produtos Cadastrados:**
  - Tabela ou lista que exibe todos os produtos já cadastrados.
  - Opção de editar ou excluir produtos.

- **Visualização Prévia:**
  - Um botão para visualizar como o produto aparecerá na página de anúncios.

---

## **2. Página de Anúncios (Frontend Público)**
Essa área será pública e exibirá os produtos cadastrados de forma elegante e responsiva.

### **Funcionalidades:**

- **Cabeçalho (Header):**
  - Logo do site.
  - Menu de navegação (opcional, se houver categorias ou páginas extras).

- **Listagem de Produtos:**
  - Exibição dos produtos em formato de grade (grid) ou lista.
  - Cada produto deve mostrar:
    - Imagem do produto.
    - Nome do produto.
    - Descrição breve.
    - Botão "Comprar" que redireciona para o link de afiliado da Shopee.

- **Design Responsivo:**
  - A página deve se adaptar a diferentes dispositivos (celulares, tablets, desktops).

- **Rodapé (Footer):**
  - Informações de contato ou links para redes sociais (opcional).

---

## **3. Requisitos Gerais**
- **Automatização:**
  - Os produtos cadastrados na área administrativa devem aparecer automaticamente na página de anúncios.

- **Banco de Dados:**
  - Usar o Firebase para armazenar os dados dos produtos (nome, descrição, imagem, link de afiliado).

- **Interface Intuitiva:**
  - Design limpo e moderno, com cores e fontes que transmitam confiança.
  - Botões e links claros para facilitar a navegação.

- **Segurança:**
  - A área administrativa deve ser protegida, acessível apenas com login.

---

## **4. Próximos Passos**

1. **Definir o Design:**
   - Criar um esboço (wireframe) de como a página de anúncios e a área administrativa devem ficar.

2. **Escolher um Template ou Framework:**
   - Para facilitar o desenvolvimento, você pode usar frameworks como Bootstrap (para CSS) ou bibliotecas JavaScript como React (opcional).

3. **Configurar o Firebase:**
   - Criar o banco de dados e configurar a autenticação para a área administrativa.

4. **Desenvolver a Estrutura Básica:**
   - Criar as páginas HTML, estilizar com CSS e adicionar interatividade com JavaScript.

---

Se precisar de ajuda em qualquer uma dessas etapas, é só avisar! 😊
\

meu-site-afiliado/
│
├── **index.html**                # Página principal (página de anúncios)
├── **admin.html**               # Página da área administrativa
├── **styles/**                  # Pasta para arquivos CSS
│   ├── **global.css**           # Estilos globais (comuns a todas as páginas)
│   ├── **index.css**            # Estilos específicos da página de anúncios
│   └── **admin.css**            # Estilos específicos da área administrativa
├── **scripts/**                 # Pasta para arquivos JavaScript
│   ├── **firebase-config.js**   # Configuração do Firebase (autenticação e banco de dados)
│   ├── **index.js**             # Scripts da página de anúncios
│   └── **admin.js**             # Scripts da área administrativa
├── **images/**                  # Pasta para armazenar imagens (logos, ícones, etc.)
├── **uploads/**                 # Pasta para armazenar imagens dos produtos (opcional)
└── **README.md**                # Documentação do projeto (opcional)  
