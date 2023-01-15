package main

import (
	"fmt"
	"log"
	"net/http"

	"github.com/gobwas/ws"
	"github.com/gobwas/ws/wsutil"
)

func main() {
	var cars = [4]string{"Volvo", "BMW", "Ford", "Mazda"}
	http.ListenAndServe(":8090", http.HandlerFunc(func(w http.ResponseWriter, r *http.Request) {
		conn, _, _, err := ws.UpgradeHTTP(r, w)
		if err != nil {
			log.Fatal(err)
		}
		go func() {
			defer conn.Close()

			for {
				_, op, err := wsutil.ReadClientData(conn)
				if err != nil {
					fmt.Println("Error receiving data: " + err.Error())
					fmt.Println("Client disconnected")
					return
				}
				for i := 0; i < len(cars); i++ {
					err = wsutil.WriteServerMessage(conn, op, []byte(cars[i]))
					if err != nil {
						fmt.Println("Error sending data: " + err.Error())
						fmt.Println("Client disconnected")
						return
					}
					fmt.Println("Server message send: " + cars[i])
				}
			}
		}()
	}))
}
