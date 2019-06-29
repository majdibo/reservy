FROM gitpod/workspace-full
#alpine:3.7
MAINTAINER Majdi Ben Ouaghrem "majdi.ben.ouaghrem@gmail.com"

RUN apk add --no-cache nodejs
RUN npm install -g @angular/cli@7.3.9

RUN mkdir -p /usr/src/app

VOLUME /usr/src/app
WORKDIR /usr/src/app

EXPOSE 4200

ENTRYPOINT ["npm"]
CMD ["install"]