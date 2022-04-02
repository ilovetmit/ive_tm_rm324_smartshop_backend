#!/bin/bash
multichaind vitcoin_chain --deamon &
cd /home/one92/project_pool/ive_tm_fyp_smart_shop/
laravel-echo-server start &

########################
# Fruit VR App
# Viro Medio app :8081
########################

#cd /home/one92/project_pool/viro-ar-fruits/
#npm start &
