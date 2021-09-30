FROM ubuntu
RUN apt update && apt install -y wget
RUN mkdir app && touch /app/test && echo "hello" > /app/test
COPY ./download.sh  /download.sh 
RUN chmod +x download.sh
ENTRYPOINT /bin/bash download.sh
