# CalculatorSupplyChain

🧚‍♀️ User story
Como miembro del equipo Supply Chain 
Quiero una calculadora de precios
Para poder calcular de forma rapida los precios que nos ofrecen nuestros proveedores.

⚡ Acceptance Tests
Scenario: En la calculadora introduzco el numero de articulos, el importe por articulo, y el pais de origen y al pulsar en calcular me devuelve el importe total del pedido con los impuestos y los descuentos aplicados.
Given. Estoy en la calculadora
When. Introduzco el numero de articulos (3000)
And. Introduzco el importe por pedido (1.99)
And. Introduzco el pais de origen (España)
And pulso en el botón de calcular
Then. Visualizo el importe total del pedido, con el descuento y los impuestos aplicados (5778,96€)
And. Visualizo que descuento (20%) y que impuesto se ha aplicado (21%)

¡IMPORTANTE!

Listado de paises disponibles y su % de impuestos:
España (21%)
Italia (22%)
Francia (20%)
Portugal (23%)
Reino Unido (20%)

Descuentos por importe total del pedido: El proveedor nos aplicará un descuento por volumen de compra, a continuación se indica el descuento que nos aplicará en función del importe del pedido:
⚠️ Los impuestos se han de calcular despues de aplicar los descuentos.
 
De 0€ a 5.000€ → Descuento del 15%
De 5.001€ a 10.000 € → Descuento del 20%
De 10.001€ a 15.000€ → Descuento del 25%
De 15.001€ a 20.000 €→ Descuento del 30%
De 20.001€ a 30.000 €→ Descuento del 50%

Indicaciones para el desarrollador
Crea las subtareas que consideres necesarias en ésta tarea para poder llevar un control del desarrollo.
Realiza un diseño responsive para que la calculadora pueda utilizarse en dispositivos móviles.
Intenta que el diseño sea lo más profesional posible ¡Hay que impresionar a Supply Chain!
Libertad total en cuanto a tecnologia a utilizar (php, js, frameworks...)
Trabajar sobre el proyecto welcome de gitlab.
