<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?> 
<div class="d-none"> 
<div style="background-color: #F0F0F0;"> 
<div class="loolsx" style="width: 90%; max-width: 600px;margin-left: auto;margin-right: auto;margin-top: 24px;"> 
<!-- header info --> 
<div style="padding: 24px 32px; background: #F6F7F7;border: 1px solid #F0F0F1;text-align: center;"> 
<div style="font-weight: 400;font-size: 14px;line-height: 22px;color: #3858E9;">
<span class="tumaz_displayEmail">
</span> 
<span style="color: #1D2327;">acaba de realizar un pago directo
</span>
</div>  
<div style="font-weight: 700;font-size: 24px;line-height: 29px;color: #1D2327;">
<span class="digages-woodp-order-currency"></span><span class="digages-woodp-order-amount"></span>
</div>
</div> 
<!-- header info --> 
<!-- body main -->     
<div style="background-color: #fff;padding-bottom: 24px;margin-bottom: 20px;padding-left: 20px;padding-right: 20px;">     
<div style="border-bottom: 1px dashed #F0F0F1;padding-top: 16px;padding-bottom: 20px;">     
<div style="color: #1D2327;text-align: center;font-weight: 600;font-size: 14px;line-height: 17px;letter-spacing: -0.02em;">Detalles de la Transacción
</div>     
</div>     
<!-- order details -->      
<table style="width: 100%; border-collapse: collapse;font-size: 14px;line-height: 22px;">      
<tr style="border-bottom: 1px dashed #F0F0F1;">     
<td style="padding-top: 12px;padding-bottom: 12px;text-align: left;font-weight: 400;font-size: 14px;line-height: 22px;color: #646970;">Nombre completo:    
<span style="color: #1D2327;">    
<span class="tumaz_displayFirstName">    
</span>     
<span class="tumaz_displayLastName">    
</span>    
</span>
</td>    
</tr>      
<tr style="border-bottom: 1px dashed #F0F0F1;">     
<td style="padding-top: 12px;padding-bottom: 12px;text-align: left;font-weight: 400;font-size: 14px;line-height: 22px;color: #646970;">Orden:    
<span style="color: #1D2327;">Orden #<span class="orderNumberDisplay"></span>    
</span>
</td>     
</tr>      
<tr style="border-bottom: 1px dashed #F0F0F1;">     
<td style="padding-top: 12px;padding-bottom: 12px;text-align: left;font-weight: 400;font-size: 14px;line-height: 22px;color: #646970;">Fecha:    
<span style="color: #1D2327;">    
<?php $formatted_date = gmdate('m/d/y, g:ia'); echo esc_html($formatted_date);?>    
</span>
</td>     
</tr>     
<tr style="border-bottom: 1px dashed #F0F0F1;">     
<td style="padding-top: 12px;padding-bottom: 12px;text-align: left;font-weight: 400;font-size: 14px;line-height: 22px;color: #646970;">Proveedor de Mobile Money:    
<span style="color: #1D2327;">    
<span class="tumazmobname">    
</span>    
</span>
</td>     
</tr>      
<tr style="border-bottom: 1px dashed #F0F0F1;">     
<td style="padding-top: 12px;padding-bottom: 12px;text-align: left;font-weight: 400;font-size: 14px;line-height: 22px;color: #646970;">Número de Teléfono:    
<span style="color: #1D2327;">    
<span class="tumazmobnumber">    
</span>    
</span>
</td>     
</tr>      
<tr style="border-bottom: 1px dashed #F0F0F1;">     
<td style="padding-top: 12px;padding-bottom: 12px;text-align: left;font-weight: 400;font-size: 14px;line-height: 22px;color: #646970;">Nombre de la Cuenta:    
<span style="color: #1D2327;">    
<span class="tumazmobaccount">    
</span>    
</span>
</td>     
</tr>      
</table>      

<div style="text-align: center;padding-top: 20px;padding-bottom: 0px;">
<a href="
<?php echo esc_html(site_url()); ?>/wp-admin/admin.php?page=digages-direct-payments/" style="color: #3858E9;">Ver en la página de Pagos Directos en el panel de administración
</a>
</div> 
<!-- body main -->    
</div>    
<div style="padding-bottom: 20px; text-align: center; font-style: normal;font-weight: 400;font-size: 12px;line-height: 16px;color: #50575E;">© 
<?php echo esc_html( get_option( 'blogname' ) );?> — Powered by 
<a href="https://digages.com/direct-payments-for-woocommerce/" style="color: #50575E;">Direct Payments for Woocommerce
</a>
</div>     
</div>   
</div> 
</div>          