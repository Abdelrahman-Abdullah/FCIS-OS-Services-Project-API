# OS Project API For Flutter


## Overview

Services Project That Responsible for Make The Connection Between Customers And Workers as close as possible
This API Covered Most Of We Need For This Work.

## Notes
- `?` => This Property Is Optional
- Protected Route Using `Sanctum` Token




## Routes
<table>
        <thead>
            <tr>
                <th>HTTP Method</th>
                <th rowsapn="2">End Point</th>
                <th>Request Body</th>
                <th rowspan="3">Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>GET</td>
                <td>/api/v1/workers</td>
                <td>N/A</td>
                <td>Get All Workers</td>
            </tr>
            <tr>
                <td>GET</td>
                <td>/api/v1/user</td>
                <td>N/A</td>
                <td>Get Specific User Or Worker According to who logged in</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/users/register</td>
                <td>
                    <ul>
                        <li>
                            name
                        </li>
                        <li>
                            email
                        </li>
                        <li>
                            address
                        </li>
                        <li>
                            password
                        </li>
                        <li>
                            phone
                        </li>
                        <li>
                            type
                        </li>
                        <li>
                            thumbnail?
                        </li>
                        <li>
                            bio?
                        </li>
                        <li>
                            jobName?
                        </li>
                    </ul>
                </td>
                <td>Add a New User or Worker According to type</td>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/users/login</td>
                <td>
                    <ul>
                        <li>
                            email
                        </li>
                        <li>
                            password
                        </li>
                    </ul>
                </td>
                <td>Login With an Exist User or Worker</td>
            </tr>
            <tr>
                <th colspan="4">
                    Protected Routes Using Token Must Be Authenticated To Access
                </th>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/user</td>
                <td>
                    N/A
                </td>
                <td>Log User Out</td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/api/v1/user</td>
                <td>
                    <ul>
                        <li>
                            name
                        </li>
                        <li>
                            address
                        </li>
                        <li>
                            password
                        </li>
                        <li>
                            phone
                        </li>
                        <li>
                            thumbnail?
                        </li>
                        <li>
                            bio?
                        </li>
                        <li>
                            jobName?
                        </li>
                    </ul>
                </td>
                <td>Update User or Worker Data</td>
            </tr>
            <tr>
                <th colspan="4">
                    Only Workers Can Access
                </th>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/job-photos</td>
                <td>
                    <ul>
                        <li>
                            file
                        </li>
                    </ul>
                </td>
                <td>Add New Photo For This Worker</td>
            </tr>
            <tr>
                <td>PUT</td>
                <td>/api/v1/orders/:id</td>
                <td>
                    <ul>
                        <li>
                            status
                        </li>
                    </ul>
                </td>
                <td>Update Exist Order Status</td>
            </tr>
            <tr>
                <th colspan="4">
                    Only Users Can Access
                </th>
            </tr>
            <tr>
                <td>POST</td>
                <td>/api/v1/orders</td>
                <td>
                    <ul>
                        <li>
                            workerId
                        </li>
                    </ul>
                </td>
                <td>Add New Order</td>
            </tr>
            <tr>
                <td>DELETE</td>
                <td>/api/v1/orders/:id</td>
                <td>
                    N/A
                </td>
                <td>Cancel an Exist Order</td>
            </tr>
        <tr>
            <td>GET</td>
            <td>/api/v1/favourites</td>
            <td>
                N/A
            </td>
            <td>Gat All User Favourites</td>
        </tr>
        <tr>
            <td>POST</td>
            <td>/api/v1/add-favourite</td>
            <td>
                workerId
            </td>
            <td>Add to User Favourites</td>
        </tr>
        <tr>
            <td>DELETE</td>
            <td>/api/v1/delete-favourite/:id</td>
            <td>
                N/A
            </td>
            <td>Delete From User Favourites</td>
        </tr>
    </tbody>
    </table>
