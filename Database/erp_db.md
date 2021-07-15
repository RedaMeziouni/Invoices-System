# __Supplier Part__

## COMPANY 
- [ ] ID
- [ ] Name
- [ ]	NRC
- [ ]	Adresse
- [ ]	Locations
- [ ]	Phone Number
- [ ] Fax Number

## EMPLOYEES (Managers)
- [ ]	ID
- [ ]	First Name 
- [ ]	Last Name
- [ ] Mail
- [ ]	Role_id
- [ ]	-Status_id
- [ ]	-company_id

## Employee_Roles
- [ ] ID
- [ ] Roles (String => Manager / Driver / Commercial)

## Employee_Status
- [ ] ID
- [ ] E_Status (AV / NAV)

# __Warhouse Part__

## MERCHANDISE
- [ ] ID
- [ ] Name
- [ ] Quantity
- [ ] Description
- [ ] Category_id
- [ ] Commande_id

## MERCHANDISE_CATEGORY 
- [ ] ID
- [ ] Category (type)

## STOCKS
- [ ] ID
- [ ] Merchandise_id
- [ ] Stock_Status

## STOCK_STATUS
- [ ] ID
- [ ] S_status (String => AV / NAV)

## COMMANDES
- [ ] ID
- [ ] Name
- [ ] Description
- [ ] Quantity (Q)
- [ ] Price per Unit (PpU)
- [ ] Total (PpU * Q = Ttl)
- [ ] Total_Price (Ttl + Trp)
- [ ] Merchandise_id
- [ ] Client_id
- [ ] Loading_id
- [ ] Company_id

## PAYMENTS
- [ ] ID
- [ ] Payment_Number
- [ ] Payment_Methods
- [ ] Commande_id
- [ ] Client_id
- [ ] P_Status_id

## PAYMENTS_STATUS
- [ ] ID
- [ ] P_Status (To Pay / In Progress / Done)

## PAYMENT_METHOD
- [ ] ID
- [ ] P_Methods (Espéce / Cheque)

# __Retailer Part__

## CLIENTS
- [ ] ID
- [ ] First Name
- [ ] Last Name
- [ ] @Mail
- [ ] Adress
- [ ] Phone Number
- [ ] Fax Number
- [ ] Client Status

## CLIENT_STATUS
- [ ] ID
- [ ] C_Status (xxxx)

# Logistic Paart

## LOADING
- [ ] ID
- [ ] Arrival_Date
- [ ] Loading_Date
- [ ] D_Status_id
- [ ] Vehicle_id
- [ ] Driver_id
- [ ] Mission_id

## MISION
- [ ] ID
- [ ] Date
- [ ] Departive
- [ ] Arrival
- [ ] Merchandise_id

## MISSIONS_STATUS
- [ ] ID
- [ ] M_Status (Taken / In Progress / Done)

## VEHICLES
- [ ] ID
- [ ] Name
- [ ] N° of place
- [ ] Type_id
- [ ] V_Status_id

## V_TYPE
- [ ] ID
- [ ] Type (Small / Large / Big)

## V_STATUS
- [ ] ID
- [ ] V_Status (AV / NAV)

## DRIVERS
- [ ] ID
- [ ] Name
- [ ] First Name
- [ ] Last Name
- [ ] @Mail
- [ ] Adress
- [ ] Phone Number
- [ ] Level
- [ ] D_Status

## DRIVER_STATUS
- [ ] ID 
- [ ] D_Status (AV / NAV)
