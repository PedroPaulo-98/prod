# Use a imagem base do PHP 8.1 com extensões necessárias para Laravel
FROM php:8.1-cli

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Limpa o cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala extensões do PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www

# Copia os arquivos do projeto (exceto os definidos no .dockerignore)
COPY . .

# Instala as dependências do projeto (ignorando scripts para otimizar a construção)
RUN composer install --no-scripts --no-autoloader

# Copia as variáveis de ambiente (ajuste conforme necessário)
COPY .env.example .env

# Gera a chave da aplicação
RUN php artisan key:generate

# Otimiza o carregamento do Composer
RUN composer dump-autoload --optimize && composer run-script post-install-cmd

# Expõe a porta 8000 (porta padrão do artisan serve)
EXPOSE 8000

# Comando para iniciar o servidor
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]