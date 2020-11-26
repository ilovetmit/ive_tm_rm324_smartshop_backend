#!/bin/bash
multichain-cli VitcoinChain stop
sleep 1
rm ./.multichain -rf
cp mutlichain.init ./.multichain -r
sleep 1
multichaind VitcoinChain -daemon
exit 0
