import React, { useCallback, useState, useEffect } from 'react'

const ListWithImage = (props) => {
    console.log(props)

    return (
        <ul class="list-group">
            {props.list.map((data, index) => (
                <div className="d-flex">
                    <a href={data.url}>
                        <img src={data.imageUrl} alt={data.name} />
                        <li key={index.toString()} class="list-group-item">
                            {data.name}
                        </li>
                    </a>
                </div>
            ))}
        </ul>
    )
}

export default ListWithImage
