import React, { useCallback, useState, useEffect } from 'react'

const List = (props) => {
    return (
        <ul class="list-group">
            {props.list.map((data) => (
                <li key={index.toString()} class="list-group-item">
                    {data.title}
                </li>
            ))}
        </ul>
    )
}

export default List
