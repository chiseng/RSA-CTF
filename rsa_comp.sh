#!/bin/bash

while true; do
printf "d=12345\na=1234" | nc -lnp 1234 | exit
done
