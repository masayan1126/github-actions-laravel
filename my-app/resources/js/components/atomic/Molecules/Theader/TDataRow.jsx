import React, { useCallback, useState, useEffect } from 'react'
import TData from '../../Atoms/Table/TData'

const TDataRow = (props) => {
    return (
        <tr>
            {props.dataList.map((data) => (
                <TData data={data} />
            ))}
        </tr>
    )
}

export default TDataRow
