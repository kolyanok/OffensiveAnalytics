FROM php:7.4-cli
COPY . /usr/src/offensiveanalytics
WORKDIR /usr/src/offensiveanalytics
RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip unzip

RUN curl --silent --show-error https://getcomposer.org/installer | php