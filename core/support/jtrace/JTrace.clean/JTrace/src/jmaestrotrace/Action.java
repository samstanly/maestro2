package jmaestrotrace;

import java.awt.Dimension;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JTextArea;
import javax.swing.JTextField;
import javax.swing.event.DocumentEvent;
import javax.swing.event.DocumentListener;

public class Action {

	private static JButton btnComeca = new JButton();
	private static JButton btnPara = new JButton();
	private static JButton btnLimpa = new JButton();
	private static JButton btnSobre = new JButton();
	private static JButton btnTab = new JButton();
	private static JButton btnNewTab = new JButton();
	private static JTextField txtBusca = new JTextField();
	private static DumpArea tabbedPane = new DumpArea();
	private static JTextField txtPorta;
	private static JLabel lblPorta;
	private static JLabel lblConnect;
	private static HashMap<String, JTextArea> map;
	public static boolean para = false;
	public static ServerSocket srv;
	public static Thread th;
	public static Socket skt;
	private static BufferedReader in;
	private static ArrayList<String> tabs;
	private static String vRetorno, vMensagem;
	private static int cont;
	private static JFrame frame;

	Action(JLabel labelPorta, JTextField textPorta, JLabel labelConnect,
			DumpArea j, JFrame f) {
		txtPorta = textPorta;
		lblPorta = labelPorta;
		lblConnect = labelConnect;
		tabbedPane = j;
		map = tabbedPane.getMap();
		tabs = tabbedPane.getTabs();
		frame = f;

	}

	public static JButton createBtnComeca() {
		btnComeca.setText("Comeca");
		btnComeca.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent evt) {
				btnComecaListener(evt);
			}
		});
		return btnComeca;
	}

	private static void btnComecaListener(ActionEvent evt) {
		try {
			lblConnect.setText("aguardando conexao...");
			srv = new ServerSocket(Integer.parseInt(txtPorta.getText()));
			lblConnect.setText("conectado ao Maestro");
			lblConnect.repaint();
			para = false;
			btnPara.setEnabled(true);
			btnComeca.setEnabled(false);
			txtPorta.setEnabled(false);
			execute();
		} catch (Exception e) {
			lblConnect.setText("Nao conectado");
			System.out.println(e.toString());
		}
	}

	public static JButton createBtnPara() {
		btnPara.setText("Para");
		btnPara.setEnabled(false);
		btnPara.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent evt) {
				btnParaListener(evt);
			}
		});
		return btnPara;
	}

	private static void btnParaListener(ActionEvent evt) {
		try {
			para = true;
			th.interrupt();
			lblConnect.setText("Nao conectado");
			srv.close();
			btnPara.setEnabled(false);
			btnComeca.setEnabled(true);
			txtPorta.setEnabled(true);
		} catch (Exception e) {
			lblConnect.setText("???");
			System.out.println(e.toString());
		}
	}

	public static JButton createBtnLimpa() {
		btnLimpa.setText("Limpa");
		btnLimpa.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent evt) {
				btnLimpaListener(evt);
			}
		});
		return btnLimpa;
	}

	private static void btnLimpaListener(ActionEvent evt) {
		cont = 0;
		for (JTextArea j : map.values()) {
			j.setText("");
		}
	}

	public static JButton createBtnTab() {
		btnTab.setText("Escolher Tabs");
		btnTab.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent evt) {
				btnTabListener(evt);
			}
		});
		return btnTab;
	}

	private static void btnTabListener(ActionEvent evt) {
		SelectTabsDialog myDialog = new SelectTabsDialog(frame);
		myDialog.setVisible(true);
	}

	public static JButton createBtnNewTab() {
		btnNewTab.setText("Nova Tab");
		btnNewTab.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent evt) {
				btnNewTabListener(evt);
			}
		});
		return btnNewTab;
	}

	private static void btnNewTabListener(ActionEvent evt) {
		NewTabDialog myDialog = new NewTabDialog(frame);
		myDialog.setVisible(true);
	}

	public static JTextField createTextFieldBusca() {
		txtBusca.setPreferredSize(new Dimension(150, 25));
		txtBusca.getDocument().addDocumentListener(new DocumentListener() {
			public void changedUpdate(DocumentEvent e) {
				warn();
			}

			public void removeUpdate(DocumentEvent e) {
				warn();
			}

			public void insertUpdate(DocumentEvent e) {
				warn();
			}

			public void warn() {
				try {
					final JTextArea txaTodas = map.get("Todas");
					final JTextArea txaBusca = map.get("Busca");
					tabbedPane.setSelectedIndex(1);
					txaBusca.setText("");
					int length = txaTodas.getDocument().getLength();
					String fullLog = txaTodas.getDocument().getText(0, length);
					String lines[] = fullLog.split("\\r?\\n");
					for (String line : lines) {
						if (line.toLowerCase().contains(
								txtBusca.getText().toLowerCase())) {
							txaBusca.append(line + "\n");
						}
					}
				} catch (Exception e) {
					System.out.println(e.toString());
				}
			}
		});
		return txtBusca;
	}

	public static void execute() {
		final JTextArea txaTodas = map.get("Todas");		
		cont = 0;
		th = new Thread(new Runnable() {
			@Override
			public void run() {
				try {
					skt = srv.accept();
					in = new BufferedReader(new InputStreamReader(skt
							.getInputStream()));
					while (!Thread.currentThread().isInterrupted()) {
						if (para)
							break;						
						vRetorno = in.readLine();
						JTextArea currentArea = null;
						while (true) {
							vRetorno = vRetorno + "\n";
							if (vRetorno.startsWith("[RESET_LOG_MESSAGES]")) {
								cont = 0;
							}
							vMensagem = cont + ": " + vRetorno;
							cont++;
							txaTodas.append(vMensagem);
							txaTodas.setCaretPosition(txaTodas.getDocument()
									.getLength());
							//Se nao e tab nova, mas continua a anterior
							if ((vRetorno.toUpperCase().startsWith("[") == false) && (currentArea != null)) {
								currentArea.append(vRetorno);
								currentArea.setCaretPosition(currentArea
										.getDocument().getLength());
							} else {
								for (String tab : tabs) {
									if (vRetorno.toUpperCase().startsWith(
											"[" + tab.toUpperCase() + "]")) {
										JTextArea textArea = map.get(tab);
										textArea.append(vMensagem);
										textArea.setCaretPosition(textArea
												.getDocument().getLength());
										currentArea = textArea;
										break;
									}
								}
							}							
							vRetorno = in.readLine();
							System.out.println(vRetorno);
							th.sleep(10);
							if (vRetorno == null) {
								skt.close();
								skt = srv.accept();
								in = new BufferedReader(new InputStreamReader(
										skt.getInputStream()));
								th.sleep(100);								
								vRetorno = in.readLine();
								System.out.println(vRetorno);
							}
						}
					}
					System.out.println("SAIU DO LOOP!");
				} catch (Exception e) {
					for(StackTraceElement x : e.getStackTrace()){
						System.out.println(x.toString());
					}
					
				}
			}
		});
		th.start();
	}
}
